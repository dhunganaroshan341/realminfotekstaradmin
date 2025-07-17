<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
  use App\Models\User;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $latestOrder = 1;
    public function __construct()
    {
        $this->middleware('auth');
        $this->latestOrder = Service::max('order') ?? 0; // Get the maximum order value
        $this->latestOrder++; // Increment it for the next user
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search.value');
            $columns = $request->input('columns');
            $pageSize = $request->input('length');
            $order = $request->input(['order'])[0];
            $orderColumnIndex = $order['column'];
            $orderBy = $order['dir'];
            $start = $request->input('start');

            $testimonial = Service::query();
            $totalTestimonial = $testimonial->count();

            $searchTestimonial = $testimonial->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('short_desc', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });

            $searchCount = $searchTestimonial->count();
            $response = $searchTestimonial->orderBy($columns[$orderColumnIndex]['data'], $orderBy)
                ->offset($start)
                ->limit($pageSize);
            return DataTables::of($response)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return view('Admin.Button.button', compact('data'));
                })
                ->addColumn('image', function ($item) {
                    $dataimage = asset('uploads/' . $item->image);
                    $defaultImage=asset('defaultImage/defaultimage.webp');
                    return ' <td class="py-1">
                    <img src="' . $dataimage . '" width="50" height="50" onerror="this.src=\''.$defaultImage.'\'"/>
                    </td>';
                })
                ->addColumn('description', function ($item) {
                    return Str::limit(strip_tags($item->description), 20);
                })
                ->addColumn('status', function ($status) {
                    $checked = $status->status == '1' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                    <input class="form-check-input statusIdData d-flex mx-auto" type="checkbox" data-id="' . $status->id . '" role="switch" id="flexSwitchCheckChecked" ' . $checked . '>
                    </div>';
                })
                ->with('recordsTotal', $totalTestimonial)
                ->with('recordsFiltered', $searchCount)

                ->rawColumns(['action', 'image', 'status'])
                ->make(true);
        }

        $extraJs = array_merge(
            config('js-map.admin.datatable.script'),
            config('js-map.admin.summernote.script'),
            config('js-map.admin.buttons.script')
        );

        $extraCs = array_merge(
            config('js-map.admin.datatable.style'),
            config('js-map.admin.summernote.style'),
            config('js-map.admin.buttons.style')
        );
        return view('Admin.pages.Services.service', ['extraJs' => $extraJs, 'extraCs' => $extraCs]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        try {
            $data = $request->only(['name', 'short_desc', 'description']);
            if ($request->hasFile('image')) {
                $path = '/images/service/';
                $imagename = time() . '.' . $request->image->extension();
                $path = $request->image->storeAs($path, $imagename, 'public');
                $data['image'] = $path;
            }
            Service::create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Service::find($id);
            return response()->json(['success' => true, 'message' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        try {
            $services = Service::find($id);
            $services->name = $request->input('name');
            $services->short_desc = $request->input('short_desc');
            $services->description = $request->input('description');
            if ($request->hasFile('image')) {
                $filepath = '/images/service/';
                if ($services->image !== null) {
                    Storage::disk('public')->delete($services->image);
                }
                $imagename = time() . '.' . $request->image->extension();
                $path = $request->image->storeAs($filepath, $imagename, 'public');
                $services->image = $path;
            }
            $services->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function toggleStatus($id)
    {
        try {
            $data = Service::find($id);

            if ($data->status === 1) {
                $data->status = 0;
            } else {
                $data->status = 1;
            }
            $data->save();
            return response()->json(['success' => true, 'message' => 'Status Changes'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Service::find($id);
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }
            $data->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


public function storeServiceQuery(Request $request)
{
    try {
        // Step 1: Validate form input
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
            'message'    => 'required|string|min:5|max:1000',
            'service_id' => 'required|exists:services,id',
        ]);

        // Step 2: Check if email is registered


        // Optional: Also check if the user's email is verified


        // Step 3: Check for recent duplicate submissions (same email+phone+message)
        $duplicate = ServiceQuery::where('email', $request->email)
            ->where('phone', $request->phone)
            ->where('message', $request->message)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->exists();

        if ($duplicate) {
            return response()->json([
                'success' => false,
                'message' => 'You have already sent this message recently. Please wait 10 minutes before trying again.'
            ]);
        }

        // Step 4: Save the service query
        $data = $request->only(['name', 'email', 'phone', 'message', 'service_id']);
        ServiceQuery::create($data);

        $serviceDetail = Service::find($request->service_id);

        return response()->json([
            'success' => true,
            'message' => 'Query submitted successfully.',
            'serviceName' => $serviceDetail?->name ?? 'Unknown Service'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
public function latestOrder()
    {
        try {

            return response()->json(data: ['success' => true, 'message' => $this->latestOrder]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
