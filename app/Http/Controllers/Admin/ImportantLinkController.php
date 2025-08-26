<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportantLink;
use Illuminate\Http\Request;

class ImportantLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $importantLinks = ImportantLink::all();
        return view('admin.pages.important-links.index', compact('importantLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.important-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'open_in_new_tab' => 'nullable|boolean',
        ]);

        ImportantLink::create([
            'name' => $request->name,
            'url' => $request->url,
            'open_in_new_tab' => $request->open_in_new_tab ?? 0,
        ]);

        return redirect()->route('admin.important-links.index')->with('toast_success', 'Berhasil menambahkan tautan penting.');
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
        $importantLink = ImportantLink::findOrFail($id);
        return view('admin.pages.important-links.edit', compact('importantLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $importantLink = ImportantLink::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'open_in_new_tab' => 'nullable|boolean',
            'is_shown' => 'nullable|boolean',
        ]);

        $importantLink->update([
            'name' => $request->name,
            'url' => $request->url,
            'open_in_new_tab' => $request->open_in_new_tab ?? 0,
            'is_shown' => $request->is_shown ?? 0,
        ]);

        return redirect()->route('admin.important-links.index')->with('toast_success', 'Berhasil memperbarui tautan penting.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $importantLink = ImportantLink::findOrFail($id);
        $importantLink->delete();

        return redirect()->route('admin.important-links.index')->with('toast_success', 'Berhasil menghapus tautan penting.');
    }
}
