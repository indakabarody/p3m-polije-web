<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('name', 'ASC')->get();
        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:clients',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'url' => 'nullable|url|max:512',
            'description' => 'nullable|string|max:65535',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'url' => $request->url,
            'description' => $request->description,
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/clients/' . $client->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            // $img->cover(800, 800);
            $img->save($path . '/' . $fileName);

            $client->update([
                'image' => $fileName
            ]);
        }

        return redirect()->route('admin.clients.index')->with('toast_success', 'Berhasil menambahkan data klien.');
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
        $client = Client::findOrFail($id);
        return view('admin.pages.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:clients,slug,' . $client->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'url' => 'nullable|url|max:512',
            'is_shown' => 'nullable|min:0|max:1',
            'description' => 'nullable|string|max:65535',
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/clients/' . $client->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if (File::isFile($path . '/' . $client->image)) {
                File::delete($path . '/' . $client->image);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(800, 800);
            $img->save($path . '/' . $fileName);
        }

        $client->update([
            'name' => $request->name,
            'image' => $fileName ?? $client->image,
            'url' => $request->url,
            'description' => $request->description,
            'is_shown' => $request->is_shown ?? 0,
        ]);

        return redirect()->route('admin.clients.index')->with('toast_success', 'Berhasil menyimpan data klien.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);

        $path = storage_path('app/public/admin/clients/' . $client->id);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        if (File::isFile($path . '/' . $client->image)) {
            File::delete($path . '/' . $client->image);
        }

        $client->delete();

        return back()->with('toast_success', 'Berhasil menghapus data klien.');
    }
}
