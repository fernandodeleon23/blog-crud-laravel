<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Blog
Route::get('/', 'BlogController@index')->name('blog');
Route::get('/post/{id}', 'BlogController@single_post')->name('post');

// App
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

// Articulos
Route::get('/admin/posts', 'PostController@index')->name('admin-posts');
Route::get('/admin/post/create', 'PostController@create')->name('post-create');
Route::post('/admin/post/save', 'PostController@save')->name('post-save');
Route::get('/admin/post/{id}', 'PostController@post_edit')->name('post-edit');
Route::post('/admin/post_update/{id}', 'PostController@post_update')->name('post-update');
Route::get('/image/{fielname}', 'PostController@get_image')->name('get_image');
Route::get('/admin/post/delete/{id}', 'PostController@delete_post')->name('delete-post');

// Categorias
Route::get('/admin/categories', 'CategoryController@index')->name('categories');
Route::post('/admin/category_update/{id}', 'CategoryController@category_update')->name('category-update');
Route::get('/admin/category/create', 'CategoryController@category_create')->name('category-create');
Route::post('/admin/category_save', 'CategoryController@category_save')->name('category-save');
Route::get('/admin/category/{id}', 'CategoryController@category_edit')->name('category-edit');

// Api
Route::get('/api/get_posts', 'ApiController@get_posts');
Route::get('/api/get_post/{id}', 'ApiController@get_post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
