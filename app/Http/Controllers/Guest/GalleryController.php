<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::where('is_shown', 1)->latest()->get();
        return view('guest.pages.galleries.index', compact('galleries'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $gallery = Gallery::where([
            'slug' => $slug,
            'is_shown' => 1,
        ])->firstOrFail();

        return view('guest.pages.galleries.show', compact('gallery'));
    }
}
