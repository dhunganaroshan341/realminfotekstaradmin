<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\Client;
use App\Models\PageBanner;
use Illuminate\Http\Request;

class FrontGalleryController extends Controller
{
//     public function index()
// {
//     // Get albums that have an associated client, along with their media and client relationship
//     $albumsWithClients = GalleryAlbum::has('client')->with(['galleryMedia', 'client'])->get();
// $content_title="Gallery";
//     // Group albums by client
//     $clientsWithAlbums = $albumsWithClients->groupBy(function ($album) {
//         return $album->client->id; // Group by client ID
//     });

//     // Get albums that don't have an associated client
//     $albumsWithNoClients = GalleryAlbum::doesntHave('client')->with(['galleryMedia'])->get();

//     // Get all clients (if needed)
//     $clients = Client::with('albums')->get();
//     $pageBanner = PageBanner::where('page', 'gallery')->first();
//     return view('frontend.gallery', compact('content_title','clients', 'albumsWithNoClients', 'clientsWithAlbums','pageBanner'));
// }

public function gallery(Request $request)
{
    $type = $request->query('type');      // image, pdf, video, or null (all)
    $clientId = $request->query('client'); // client ID or null
    $albumId = $request->query('album');   // album ID or null

    // Validate inputs
    $allowedTypes = ['image', 'pdf', 'video', null];
    if (!in_array($type, $allowedTypes)) abort(404);

    $content_title = 'Gallery';
    $pageBanner = PageBanner::where('page', 'gallery')->first();

    if ($albumId) {
        // Show media inside a specific album (with optional type filter)
        $album = GalleryAlbum::with(['galleryMedia' => function ($query) use ($type) {
            if ($type) {
                $query->where('type', $type);
            }
        }])->findOrFail($albumId);

        $content_title = $album->title;

        return view('frontend.gallery-album-details', compact('album', 'content_title', 'pageBanner'));

    } elseif ($clientId) {
        // Show albums of a specific client, optionally filtered by type
        $albums = GalleryAlbum::where('client_id', $clientId)
            ->when($type, fn($q) => $q->where('type', $type))
            ->with('galleryMedia')
            ->get();

        $client = Client::findOrFail($clientId);
        $content_title = ($type ? ucfirst($type) : 'All') . " Albums for " . $client->name;

        return view('frontend.gallery-client-albums', compact('albums', 'client', 'content_title', 'pageBanner'));

    } else {
        // Show all albums, grouped by client and no-client, filtered by type if given
        $albumsWithClients = GalleryAlbum::has('client')
            ->when($type, fn($q) => $q->where('type', $type))
            ->with(['galleryMedia', 'client'])
            ->get();

        $clientsWithAlbums = $albumsWithClients->groupBy(fn($album) => $album->client->id);

        $albumsWithNoClients = GalleryAlbum::doesntHave('client')
            ->when($type, fn($q) => $q->where('type', $type))
            ->with('galleryMedia')
            ->get();

        $clients = Client::with('albums')->get();

        $content_title = $type ? ucfirst($type) . " Albums" : "Gallery";

        return view('frontend.gallery', compact(
            'content_title',
            'clients',
            'albumsWithNoClients',
            'clientsWithAlbums',
            'pageBanner'
        ));
    }
}





    public function show($id)
    {

        $galleryAlbum = GalleryAlbum::with(['galleryMedia', 'client'])->find($id);

        if (!$galleryAlbum) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $galleryAlbum
        ]);
    }
    public function showClient($id)
    {
        $albums = GalleryAlbum::with(['galleryMedia', 'client'])->where('client_id', $id)->where('status','Active')->get();



        if (!$albums) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => $albums
        ]);
    }

    public function getAllData()
    {

        $galleryAlbums = GalleryAlbum::with(['galleryMedia', 'client'])->get();
        if ($galleryAlbums->isEmpty()) {
            return response()->json(['message' => 'No albums found'], 404);
        }
        $albums = $galleryAlbums;
        return response()->json([
            'success' => true,
            'message' => $albums
        ]);
    }
}
