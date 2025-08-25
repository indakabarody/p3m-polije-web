<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blogCategory = BlogCategory::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where([
            'blog_category_id' => $blogCategory->id,
            'is_shown' => 1,
        ])->latest()->paginate(4);
        return view('guest.pages.blog-categories.show', compact('blogs', 'blogCategory'));
    }
}
