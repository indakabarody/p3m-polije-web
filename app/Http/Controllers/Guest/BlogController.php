<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('is_shown', 1)->latest()->paginate(10);
        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('guest.pages.blogs.index', compact('blogs', 'blogCategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where([
            'slug' => $slug,
            'is_shown' => 1,
        ])->firstOrFail();

        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();
        $blogs = Blog::where('is_shown', 1)->take(5)->latest()->get();
        return view('guest.pages.blogs.show', compact('blog', 'blogCategories', 'blogs'));
    }
}
