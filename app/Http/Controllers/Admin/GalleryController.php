<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('date', 'DESC')->get();
        return view('admin.pages.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:galleries',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'description' => 'nullable|string|max:65535',
            'date' => 'required|date',
        ]);

        $gallery = Gallery::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/galleries/' . $gallery->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);

            $gallery->update([
                'image' => $fileName
            ]);
        }

        return redirect()->route('admin.galleries.index')->with('toast_success', 'Berhasil menambahkan data klien.');
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
        $gallery = Gallery::findOrFail($id);
        return view('admin.pages.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:galleries,slug,' . $gallery->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'is_shown' => 'nullable|min:0|max:1',
            'description' => 'nullable|string|max:65535',
            'date' => 'required|date',
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/galleries/' . $gallery->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if (File::isFile($path . '/' . $gallery->image)) {
                File::delete($path . '/' . $gallery->image);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);
        }

        $gallery->update([
            'name' => $request->name,
            'image' => $fileName ?? $gallery->image,
            'description' => $request->description,
            'is_shown' => $request->is_shown ?? 0,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.galleries.index')->with('toast_success', 'Berhasil menyimpan data klien.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $path = storage_path('app/public/admin/galleries/' . $gallery->id);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        if (File::isFile($path . '/' . $gallery->image)) {
            File::delete($path . '/' . $gallery->image);
        }

        $gallery->delete();

        return back()->with('toast_success', 'Berhasil menghapus data klien.');
    }
}
