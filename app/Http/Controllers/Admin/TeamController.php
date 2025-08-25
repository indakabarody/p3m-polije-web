<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('order_number', 'ASC')->get();
        return view('admin.pages.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamCount = Team::count();
        return view('admin.pages.teams.create', compact('teamCount'));
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
            'order_number' => 'required|numeric',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'level' => 'required|string|max:255',
            'facebook_url' => 'nullable|url|string|max:65535',
            'instagram_url' => 'nullable|url|string|max:65535',
            'twitter_url' => 'nullable|url|string|max:65535',
            'linkedin_url' => 'nullable|url|string|max:65535',
            'google_scholar_url' => 'nullable|url|string|max:65535',
            'scopus_url' => 'nullable|url|string|max:65535',
            'sinta_url' => 'nullable|url|string|max:65535',
        ]);

        $team = Team::create([
            'order_number' => $request->order_number,
            'name' => $request->name,
            'level' => $request->level,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'twitter_url' => $request->twitter_url,
            'linkedin_url' => $request->linkedin_url,
            'google_scholar_url' => $request->google_scholar_url,
            'scopus_url' => $request->scopus_url,
            'sinta_url' => $request->sinta_url,
            'is_activated' => 1,
            'is_shown' => 1,
        ]);

        if ($request->image != null) {
            $path = storage_path('app/public/team/images/' . $team->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(600, 600);
            $img->save($path . '/' . $fileName);

            $team->update([
                'image' => $fileName,
            ]);
        }

        return redirect()->route('admin.teams.index')->with('toast_success', 'Berhasil menambahkan team');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamCount = Team::count();
        $team = Team::findOrFail($id);

        return view('admin.pages.teams.edit', compact('team', 'teamCount'));
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
        $team = Team::findOrFail($id);

        $request->validate([
            'order_number' => 'required|numeric',
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'image_remove' => 'nullable',
            'is_shown' => 'nullable|numeric',
            'facebook_url' => 'nullable|url|string|max:65535',
            'instagram_url' => 'nullable|url|string|max:65535',
            'twitter_url' => 'nullable|url|string|max:65535',
            'linkedin_url' => 'nullable|url|string|max:65535',
            'google_scholar_url' => 'nullable|url|string|max:65535',
            'scopus_url' => 'nullable|url|string|max:65535',
            'sinta_url' => 'nullable|url|string|max:65535',
        ]);

        if ($request->image != null) {
            $path = storage_path('app/public/team/images/' . $team->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(600, 600);
            $img->save($path . '/' . $fileName);

            $team->update([
                'image' => $fileName,
            ]);
        }

        if ($request->image_remove != null) {
            if ($team->image != null) {
                File::delete(storage_path('app/public/team/images/' . $team->id . '/' . $team->image));
            }

            $team->update([
                'image' => null,
            ]);
        }

        $team->update([
            'order_number' => $request->order_number,
            'name' => $request->name,
            'level' => $request->level,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'twitter_url' => $request->twitter_url,
            'linkedin_url' => $request->linkedin_url,
            'google_scholar_url' => $request->google_scholar_url,
            'scopus_url' => $request->scopus_url,
            'sinta_url' => $request->sinta_url,
            'is_shown' => $request->is_shown ?? 0,
        ]);

        return redirect()->route('admin.teams.index')->with('toast_success', 'Berhasil menyimpan team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::findOrfail($id)->delete();
        return back()->with('toast_success', 'Berhasil menghapus team');
    }
}
