<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('name', 'ASC')->get();
        return view('admin.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'description' => 'nullable|string|max:65535',
            'price_idr' => 'required|numeric',
            'bill_type' => 'required|string',
        ]);

        $service = Service::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price_idr' => $request->price_idr,
            'bill_type' => $request->bill_type,
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/services/' . $service->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);

            $service->update([
                'image' => $fileName
            ]);
        }

        return redirect()->route('admin.services.index')->with('toast_success', 'Berhasil menambahkan data klien.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'is_shown' => 'nullable|min:0|max:1',
            'description' => 'nullable|string|max:65535',
            'price_idr' => 'required|numeric',
            'bill_type' => 'required|string',
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/services/' . $service->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if (File::isFile($path . '/' . $service->image)) {
                File::delete($path . '/' . $service->image);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);
        }

        $service->update([
            'name' => $request->name,
            'image' => $fileName ?? $service->image,
            'description' => $request->description,
            'is_shown' => $request->is_shown ?? 0,
            'price_idr' => $request->price_idr,
            'bill_type' => $request->bill_type,
        ]);

        return redirect()->route('admin.services.index')->with('toast_success', 'Berhasil menyimpan data klien.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $path = storage_path('app/public/admin/services/' . $service->id);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        if (File::isFile($path . '/' . $service->image)) {
            File::delete($path . '/' . $service->image);
        }

        $service->delete();

        return back()->with('toast_success', 'Berhasil menghapus data klien.');
    }
}
