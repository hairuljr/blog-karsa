<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Models\Blog\{Category, Blog};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    // Blogs list page
    public function index()
    {
        $blogs = Blog::with('categories')->latest()->get();
        // return $blogs;
        return \view('pages.admin.blog.blog.index', \compact('blogs'));
    }

    // Form add Blog
    public function create()
    {
        $categories = Category::all();
        return \view('pages.admin.blog.blog.crud.create', \compact('categories'));
    }

    // Processing form add a Blog
    public function store(BlogRequest $request)
    {
        // Validasi image terpisah, krn mau custom nama image
        $request->validate([
            'thumbnail' => 'required|image',
        ]);
        if ($request->hasFile('thumbnail')) {
            $fullName = $request->thumbnail->getClientOriginalName();
            $extension = $request->thumbnail->getClientOriginalExtension();
            $onlyName = explode('.' . $extension, $fullName);
            $filenamenya = Str::slug($onlyName[0]) . '.' . $extension;
            $gambarnya = $request->thumbnail->storeAs('assets/img/blog', $filenamenya, 'public');
        } else {
            $gambarnya = 'assets/img/blog/thumbnail.jpg';
        }
        // Instance for Blog models
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category_id = $request->category_blog;
        $blog->slug = Str::slug($request->title);
        $blog->writer = $request->writer;
        $blog->date_publish = $request->date_publish;
        $blog->thumbnail = $gambarnya;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->save();

        $blog->categories()->sync($request->category_blog);

        return redirect('admin/blog')->withToastSuccess('Blog has created!');
    }

    // Show all Blogs in the backend
    public function showAll()
    {
        $blogs = Blog::latest()->get();
        return \view('pages.admin.blog.blog.show', \compact('blogs'));
    }

    // Form edit Blog
    public function edit($id)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        return \view('pages.admin.blog.blog.crud.edit', \compact('blog', 'categories'));
    }

    // Processing form edit Blog
    public function update(BlogRequest $request, $id)
    {
        $item = Blog::findOrFail($id);
        // If no image uploaded
        $pic = $item->thumbnail;

        // If there's image uploaded
        if ($request->hasFile('thumbnail')) {
            $fullName = $request->thumbnail->getClientOriginalName();
            $extension = $request->thumbnail->getClientOriginalExtension();
            $onlyName = explode('.' . $extension, $fullName);
            $filenamenya = Str::slug($onlyName[0]) . '.' . $extension;
            $gambarnya = $request->thumbnail->storeAs('assets/img/blog', $filenamenya, 'public');
        } else {
            $gambarnya = $pic;
        }

        Blog::where('id', $id)->update([
            'category_id' => $request->category_blog,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'writer' => $request->writer,
            'date_publish' => $request->date_publish,
            'thumbnail' => $gambarnya,
            'content' => $request->content,
            'status' => $request->status
        ]);

        if ($request->category_blog) {
            $blog = new Blog();
            DB::table('blog_category')->where('blog_id', $id)->delete();
            $blog->categories()->attach($request->category_blog, ['blog_id' => $id]);
        }

        return redirect('admin/blog')->withToastSuccess('Blog has updated!');
    }

    // Processing delete Blog
    public function destroy($id)
    {
        $item =  Blog::findOrFail($id);
        $item->delete();

        return redirect('admin/blog')->withToastSuccess('Blog has deleted!');
    }
}
