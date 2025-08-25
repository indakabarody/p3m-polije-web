<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'ASC')->get();
        return view('admin.pages.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'url' => 'nullable|url|max:512',
            'description' => 'nullable|string|max:65535',
        ]);

        $brand = Brand::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'url' => $request->url,
            'description' => $request->description,
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/brands/' . $brand->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);

            $brand->update([
                'image' => $fileName
            ]);
        }

        return redirect()->route('admin.brands.index')->with('toast_success', 'Berhasil menambahkan data klien.');
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
        $brand = Brand::findOrFail($id);
        return view('admin.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands,slug,' . $brand->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'url' => 'nullable|url|max:512',
            'is_shown' => 'nullable|min:0|max:1',
            'description' => 'nullable|string|max:65535',
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/brands/' . $brand->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if (File::isFile($path . '/' . $brand->image)) {
                File::delete($path . '/' . $brand->image);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);
        }

        $brand->update([
            'name' => $request->name,
            'image' => $fileName ?? $brand->image,
            'url' => $request->url,
            'description' => $request->description,
            'is_shown' => $request->is_shown ?? 0,
        ]);

        return redirect()->route('admin.brands.index')->with('toast_success', 'Berhasil menyimpan data klien.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        $path = storage_path('app/public/admin/brands/' . $brand->id);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        if (File::isFile($path . '/' . $brand->image)) {
            File::delete($path . '/' . $brand->image);
        }

        $brand->delete();

        return back()->with('toast_success', 'Berhasil menghapus data klien.');
    }
}
