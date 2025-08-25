<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('admin.pages.blogs.create', compact('blogCategories'));
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
            'blog_category_id' => 'required|numeric',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:5000',
            'content' => 'nullable|string|max:4294967295',
            'keywords' => 'nullable|string|max:65535',
        ]);

        $blogCategory = BlogCategory::findOrFail($request->blog_category_id);
        $fileName = NULL;

        if ($request->thumbnail != NULL) {
            $path = storage_path('app/public/admin/blog-thumbnails/' . Auth::user()->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('thumbnail');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(600, 280);
            $img->save($path . '/' . $fileName);
        }

        Blog::create([
            'blog_category_id' => $blogCategory->id,
            'admin_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'thumbnail' => $fileName,
            'content' => $request->content,
            'keywords' => $request->keywords,
        ]);

        return redirect()->route('admin.blogs.index')->with('toast_success', 'Berhasil menambahkan postingan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where([
            'id' => $id,
        ])->firstOrFail();

        return view('admin.pages.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where([
            'id' => $id,
        ])->firstOrFail();

        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('admin.pages.blogs.edit', compact('blog', 'blogCategories'));
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
        $blog = Blog::where([
            'id' => $id,
        ])->firstOrFail();

        $request->validate([
            'blog_category_id' => 'required|numeric',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id . ',id',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:5000',
            'content' => 'nullable|string|max:4294967295',
            'keywords' => 'nullable|string|max:65535',
            'is_shown' => 'nullable|numeric',
        ]);

        $blogCategory = BlogCategory::findOrFail($request->blog_category_id);
        $fileName = $blog->thumbnail ?? NULL;

        if ($request->thumbnail != NULL) {
            $path = storage_path('app/public/admin/blog-thumbnails/' . Auth::user()->id);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if (File::isFile($path . '/' . $blog->thumbnail)) {
                File::delete($path . '/' . $blog->thumbnail);
            }

            $file = $request->file('thumbnail');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $img = Image::read(file_get_contents($file));
            $img->cover(600, 280);
            $img->save($path . '/' . $fileName);
        }

        $blog->update([
            'blog_category_id' => $blogCategory->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'thumbnail' => $fileName,
            'content' => $request->content,
            'keywords' => $request->keywords,
            'is_shown' => $request->is_shown ?? 0,
        ]);

        return redirect()->route('admin.blogs.index')->with('toast_success', 'Berhasil menyimpan postingan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where([
            'id' => $id,
        ])->firstOrFail();

        $blog->delete();

        return back()->with('toast_success', 'Berhasil menghapus postingan.');
    }
}
