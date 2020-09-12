<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogView extends Model
{
  public static function createViewLog($blogs)
  {
    $blogViews = new BlogView();
    $blogViews->blog_id = $blogs->id;
    $blogViews->titleslug = $blogs->slug;
    $blogViews->url = \Request::url();
    $blogViews->session_id = \Request::getSession()->getId();
    $blogViews->user_id = (\Auth::check()) ? \Auth::id() : null; //this check will either put the user id or null, no need to use \Auth()->user()->id as we have an inbuild function to get auth id
    $blogViews->ip = \Request::getClientIp();
    $blogViews->agent = \Request::header('User-Agent');
    $blogViews->save(); //please note to save it at lease, very important
  }
}
