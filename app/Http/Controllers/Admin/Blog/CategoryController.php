<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Http\Requests\Blog\{CategoryRequest};
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        // \dd($categories);
        return \view('pages.admin.blog.category-blog.index', \compact('categories'));
    }
    public function create()
    {
        $model = new Category();
        return view('pages.admin.blog.category-blog.form', compact('model'));
    }

    // Processing Modal Add Category
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $model = Category::create($data);

        return $model;
    }

    public function edit($id)
    {
        $model = Category::findOrFail($id);
        return view('pages.admin.blog.category-blog.form', compact('model'));
    }

    public function show($id)
    {
        $model = Category::findOrFail($id);
        return view('pages.admin.blog.category-blog.show', compact('model'));
    }

    // Processing Modal Edit Category
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $item = Category::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function dataTable()
    {
        $model = Category::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('categoryBlog.show', $model->id),
                    'url_edit' => route('categoryBlog.edit', $model->id),
                    'url_destroy' => route('categoryBlog.destroy', $model->id)
                ]);
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->translatedFormat('l, d F Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
