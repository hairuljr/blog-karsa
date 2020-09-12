<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guard = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
