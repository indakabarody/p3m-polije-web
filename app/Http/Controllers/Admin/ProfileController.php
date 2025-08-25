<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.pages.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Admin::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'image_remove' => 'nullable',
        ]);

        $image = $admin->image;
        $path = public_path('storage/admin/images/' . $admin->id);

        if ($request->image != NULL) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if ($admin->image != NULL) {
                File::delete($path . '/' . $admin->image);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(600, 600);
            $img->save($path . '/' . $fileName);

            $image = $fileName;
        }

        if ($request->image_remove != NULL) {
            if ($admin->image != NULL) {
                File::delete(storage_path($path . $admin->image));
            }

            $image = NULL;
        }

        $admin->update([
            'name' => $request->name,
            'image' => $image,
            'email' => $request->email,
        ]);

        return back()->with('toast_success', 'Berhasil menyimpan profil');
    }
}
