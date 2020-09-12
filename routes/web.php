<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

// Frontend
Route::get('/', 'Blog\BlogController@index')->name('home');
Route::get('/blog', 'Blog\BlogController@index')->name('blog');
Route::get('/blog/cari', 'Blog\BlogController@cari')->name('cari-blog');
Route::get('/blognya/{slug}', 'Blog\BlogController@blognya')->name('blog-detail');
Route::get('/blog/kategori/{slug}', 'Blog\BlogController@kategori')->name('kategori');

// Backend
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/blog/show', 'Blog\BlogController@showAll')->name('show-blog');
        Route::resource('categoryBlog', 'Blog\CategoryController');
        Route::resource('blog', 'Blog\BlogController');
        Route::get('/table/categoryBlog', 'Blog\CategoryController@dataTable')->name('tableCategory');
    });
