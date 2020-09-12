<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\{Blog, BlogView};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
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
        // return $jml_category;
        return view('pages.blog.blog', [
            'blogs' => $blogs,
            'jml_category' => $jml_category,
            'blogPopuler' => $blogPopuler
        ]);
    }

    public function blognya(Request $request, $slug)
    {
        $blogPopuler = Blog::join("blog_views", "blog_views.blog_id", "=", "blogs.id")
            ->where("blog_views.created_at", ">=", date("Y-m-d H:i:s", strtotime('-24 hours', time())))
            ->where("blogs.status", "=", "PUBLISH")
            ->groupBy("blogs.id")
            ->orderBy(DB::raw('COUNT(blogs.id)'), 'desc')
            ->get([DB::raw('COUNT(blogs.id) as total_views'), 'blogs.*']);
        $query = "SELECT `blog_category`.`category_id`, `categories`.`category_name`, COUNT(`blog_category`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `blog_category` JOIN `categories` ON `blog_category`.`category_id` = `categories`.`id` GROUP BY `blog_category`.`category_id`";
        $jml_category = DB::select(DB::raw($query));

        $items = DB::table('blogs')->where([
            ['slug', '=', $slug],
            ['deleted_at', '=', null]
        ])->first();
        BlogView::createViewLog($items);
        return view('pages.blog.detail-blog', [
            'items' => $items,
            'jml_category' => $jml_category,
            'blogPopuler' => $blogPopuler
        ]);
    }

    public function kategori(Request $request, $slug)
    {
        $blogPopuler = Blog::join("blog_views", "blog_views.blog_id", "=", "blogs.id")
            ->where("blog_views.created_at", ">=", date("Y-m-d H:i:s", strtotime('-24 hours', time())))
            ->where("blogs.status", "=", "PUBLISH")
            ->groupBy("blogs.id")
            ->orderBy(DB::raw('COUNT(blogs.id)'), 'desc')
            ->get([DB::raw('COUNT(blogs.id) as total_views'), 'blogs.*']);
        $query = "SELECT `blog_category`.`category_id`, `categories`.`category_name`, COUNT(`blog_category`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `blog_category` JOIN `categories` ON `blog_category`.`category_id` = `categories`.`id` GROUP BY `blog_category`.`category_id`";
        $jml_category = DB::select(DB::raw($query));
        $query = "SELECT `blog_category`.`blog_id`, `blog_category`.`category_id`, `blogs`.*, `categories`.`slug` AS `slug_kat` FROM `blog_category` JOIN `blogs` ON `blogs`.`id` = `blog_category`.`blog_id` JOIN `categories` ON `blog_category`.`category_id` = `categories`.`id` WHERE `categories`.`slug` = '$slug' GROUP BY `blog_category`.`blog_id`";
        $category = DB::select(DB::raw($query));
        return view('pages.blog.kategori', [
            'category' => $category,
            'jml_category' => $jml_category,
            'blogPopuler' => $blogPopuler,
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $pencarian = DB::table('blogs')->where('title', 'like', "%" . $cari . "%")->orWhere('slug', 'like', "%" . $cari . "%")->where('status', "=", "PUBLISH")->get();
        $blogPopuler = Blog::join("blog_views", "blog_views.blog_id", "=", "blogs.id")
            ->where("blog_views.created_at", ">=", date("Y-m-d H:i:s", strtotime('-24 hours', time())))
            ->where("blogs.status", "=", "PUBLISH")
            ->groupBy("blogs.id")
            ->orderBy(DB::raw('COUNT(blogs.id)'), 'desc')
            ->get([DB::raw('COUNT(blogs.id) as total_views'), 'blogs.*']);
        $query = "SELECT `blog_category`.`category_id`, `categories`.`category_name`, COUNT(`blog_category`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `blog_category` JOIN `categories` ON `blog_category`.`category_id` = `categories`.`id` GROUP BY `blog_category`.`category_id`";
        $jml_category = DB::select(DB::raw($query));
        // mengirim data pegawai ke view index
        return view('pages.blog.cari', [
            'cari' => $cari,
            'pencarian' => $pencarian,
            'jml_category' => $jml_category,
            'blogPopuler' => $blogPopuler
        ]);
    }
}
