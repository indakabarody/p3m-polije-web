<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\AdminLoginAccessNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Intervention\Image\Laravel\Facades\Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('is_superadmin', '!=', 1)->orderBy('name', 'ASC')->get();
        return view('admin.pages.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'send_login_detail' => 'nullable|numeric',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_activated' => 1,
        ]);

        if ($request->send_login_detail == 1) {
            try {
                $admin->notify(new AdminLoginAccessNotification($request->email, $request->password));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return redirect()->route('admin.admins.index')->with('toast_success', 'Berhasil menambahkan admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.pages.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.pages.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'image_remove' => 'nullable',
            'is_activated' => 'nullable|numeric'
        ]);

        if ($request->image != NULL) {
            $path = storage_path('app/public/admin/images/' . $admin->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(600, 600);
            $img->save($path . '/' . $fileName);

            Admin::where('id', $admin->id)->update([
                'image' => $fileName
            ]);
        }

        if ($request->image_remove != NULL) {
            if ($admin->image != NULL) {
                File::delete(storage_path('app/public/admin/images/'.$admin->id.'/'.$admin->image));
            }

            Admin::where('id', $admin->id)->update([
                'image' => NULL,
            ]);
        }

        if ($admin->id != Auth::user()->id) {
            Admin::where('id', $admin->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_activated' => $request->is_activated ?? 0,
            ]);

        } else {
            Admin::where('id', $admin->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

        }

        return redirect()->route('admin.admins.index')->with('toast_success', 'Berhasil menyimpan admin');
    }

    /**
     * Show the form for editing the password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.pages.admins.edit-password', compact('admin'));
    }

    /**
     * Update the admin password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Admin::where('id', $admin->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.index')->with('toast_success', 'Berhasil menyimpan password');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrfail($id);

        if ($admin->id == Auth::user()->id || $admin->is_superadmin == 1) {
            abort(404);
        }

        $admin->delete();

        return back()->with('toast_success', 'Berhasil menghapus admin');
    }
}
