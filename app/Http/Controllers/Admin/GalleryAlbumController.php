<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryAlbumRequest;
use App\Models\Client;
use App\Models\GalleryMedia;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GalleryAlbumController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::all();
        $clients = Client::all();
        $extraJs = array_merge(
            config('js-map.admin.datatable.script'),
            config('js-map.admin.summernote.script'),
        );

        $extraCs = array_merge(
            config('js-map.admin.datatable.style'),
            config('js-map.admin.summernote.style'),
        );
        $albums = GalleryAlbum::all();
        return view('Admin.pages.Gallery.galleryAlbum',compact('clients','albums','extraJs','extraCs'));
    }
        public function getData(Request $request)
        {
            if ($request->ajax()) {
            $records = GalleryAlbum::with(['galleryMedia', 'client'])->withCount('galleryMedia') // <- this adds `gallery_media_count`->get();
            ->get();
                return DataTables::of($records)
                    ->addIndexColumn()
                    ->addColumn('title',function($data){
                        return $data->title;
                    })
                    ->addColumn('gallery', function ($item) {
                        return "<a type='button' data-id='" . $item->id . "' class='imageListPopup'>
                                    <span class='badge badge-primary'>" . $item->gallery_media_count . "</span>
                                </a>";
                    })


                // ->addColumn('title', fn($tit) => Str::limit($tit->title, 20) ?? '')
                ->addColumn('client', fn($client) => $client->client->name ?? '')
                ->addColumn('type', fn($type) => $type->type ?? '')
                ->addColumn('action', fn($data) => '<button class="btn  editAlbumButton" data-id="' . $data->id . '" type="button"><i class  = "fas fa-pencil text-primary"></i></button>
                                                     <button class="btn  deleteData" data-id="' . $data->id . '" type="button"><i class  = "fas fa-trash text-danger"></i></button>')
                ->addColumn('comment', fn($data) => '<button class="btn btn-info commentinfoBtn" data-id="' . $data->id . '" type="button">View Comments</button>')
                ->addColumn('status', fn($status) => '<div class="form-check form-switch">
                                                        <input class="form-check-input statusIdData d-flex mx-auto" type="checkbox" data-id="' . $status->id . '" role="switch" id="flexSwitchCheckChecked" ' . ($status->status == 'Active' ? 'checked' : '') . '>
                                                      </div>')
                ->rawColumns(['action', 'gallery', 'comment', 'status'])
                ->make(true);
        }
    }

public function store(GalleryAlbumRequest $request)
{
    DB::beginTransaction();

    try {
        $gallery = GalleryAlbum::create($request->validated());

        if ($request->hasFile('media_path')) {
            foreach ($request->media_path as $key => $value) {
                $file = $request->file('media_path')[$key];
                $extension = strtolower($file->getClientOriginalExtension());
                $filename = time() . '_' . $key . '.' . $extension;

                $folder = $extension === 'pdf'
                    ? 'docs/gallery-media'
                    : 'images/gallery-media';

                $file->move(public_path("uploads/{$folder}"), $filename);
                $path = "uploads/{$folder}/{$filename}";

                GalleryMedia::create([
                    'gallery_album_id' => $gallery->id,
                    'media_path' => $path,
                    'status' => 'Active',
                ]);
            }
        }

        DB::commit();
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}




    public function upload(Request $request, $id = null)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!$request->hasFile('thumbnail')) {
            return response()->json([
                'success' => false,
                'message' => 'No file was uploaded.'
            ], 400);
        }

        $file = $request->file('thumbnail');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        $album = GalleryAlbum::findOrFail($id);

        // DeleteDelete the old file if it exists
        $this->deleteIfExists($album->thumbnail);

        // Update with new file name
        $album->thumbnail = $filename;
        $album->save();

        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully',
            'thumbnail' => $filename
        ]);
    }

    private function deleteIfExists($filename)
    {
        if ($filename) {
            $filePath = public_path('uploads/' . $filename);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }}

    public function show($id)
    {
        try {
            $album = GalleryAlbum::findOrFail($id);
            return response()->json(['success' => true, 'message' => $album]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

public function update(GalleryAlbumRequest $request, $id)
{
    DB::beginTransaction();
    try {
        $album = GalleryAlbum::findOrFail($id);

        // Update album info (title, type, etc.)
        $album->update($request->validated());

        // Only append new media files if uploaded
        if ($request->hasFile('media_path')) {
            foreach ($request->file('media_path') as $key => $file) {
                $extension = strtolower($file->getClientOriginalExtension());
                $filename = time() . '_' . $key . '.' . $extension;

                if ($extension === 'pdf') {
                    $file->move(public_path('uploads/docs/gallery-media'), $filename);
                    $path = 'uploads/docs/gallery-media/' . $filename;
                } else {
                    $file->move(public_path('uploads/images/gallery-media'), $filename);
                    $path = 'uploads/images/gallery-media/' . $filename;
                }

                GalleryMedia::create([
                    'gallery_album_id' => $album->id,
                    'media_path' => $path,
                    'status' => 'Active',
                ]);
            }
        }

        DB::commit();
        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}


    public function statusToggle($id)
    {
        try {
            $album = GalleryAlbum::findOrFail($id);
            $album->status = $album->status === 'Active' ? 'Inactive' : 'Active';
            $album->save();
            return response()->json(['success' => true, 'message' => 'Status changed']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function detailGalleryAlbum($id){
        try {
            $album = GalleryAlbum::with(['client','galleryMedia'])->findOrFail($id);
        //   dd($album);
            return response()->json(['success' => true, 'message' => $album]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $album = GalleryAlbum::findOrFail($id);
            $album->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getGalleryAlbumData($id, Request $request)
{
    if ($request->ajax()) {
        // Fetch the specific album by ID
        $album = GalleryAlbum::find($id);

        // Fetch all albums without the thumbnail
        $albums = GalleryAlbum::all();

        // Fetch all clients
        $clients = Client::all();

        // Prepare the response data
        $data = [
            'album' => $album,
            'albums' => $albums,  // All albums without thumbnails
            'clients' => $clients,
        ];

        return response()->json([
            'success' => true,
            'message' => $data
        ]);
    }
}


public function destroyGalleryImage(Request $request)
    {
        try {
            // dd($request->all());
            $data = GalleryMedia::find($request->image_id);
            //    dd($data->image);
            if ($data->image != null) {
                Storage::disk('public')->delete($data->image);
            }
            $data->delete();

            return response()->json(['success' => true, 'message' => 'Image Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'line' => $e->getTrace()]);
        }
    }

    }

