<?php

namespace App\Http\Controllers;

use App\Models\Blog\{Blog};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::where('status', 'PUBLISH')->latest()->paginate(3);
        $blogPopuler = Blog::join("blog_views", "blog_views.blog_id", "=", "blogs.id")
            ->where("blog_views.created_at", ">=", date("Y-m-d H:i:s", strtotime('-24 hours', time())))
            ->where("blogs.status", "=", "PUBLISH")
            ->groupBy("blogs.id")
            ->orderBy(DB::raw('COUNT(blogs.id)'), 'desc')
            ->get([DB::raw('COUNT(blogs.id) as total_views'), 'blogs.*']);
        $query = "SELECT `blog_category`.`category_id`, `categories`.`category_name`, COUNT(`blog_category`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `blog_category` JOIN `categories` ON `blog_category`.`category_id` = `categories`.`id` GROUP BY `blog_category`.`category_id`";
        $jml_category = DB::select(DB::raw($query));
        return view('pages.blog.blog', [
            'blogs' => $blogs,
            'jml_category' => $jml_category,
            'blogPopuler' => $blogPopuler
        ]);
    }
}
