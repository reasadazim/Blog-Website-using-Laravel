<?php

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


// Frontend routes
Route::get('/', 'PageController@index')->name('index');
Route::get('/blog', 'PageController@blog')->name('blog');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/contact', 'PageController@storecontact')->name('contact');
Route::get('/post/{id}', 'PostsController@post')->name('post');
Route::post('/search', 'PageController@search')->name('search');
Route::post('/save_comment/{id}', 'CommentsController@save_comment')->name('save_comment');
Route::post('/save_reply/{id}', 'CommentsController@save_reply')->name('save_reply');
Route::get('/delete_comment/{id}', 'CommentsController@delete_comment')->name('delete_comment');
Route::get('/post_by_tag/{tag}', 'PageController@post_by_tag')->name('post_by_tag');
Route::get('/post_by_cat/{cat}', 'PageController@post_by_category')->name('post_by_cat');


// Backend routes
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
  Route::get('/create_post', 'PostsController@create_post')->name('create_post');
  Route::get('/list_posts', 'PostsController@list_posts')->name('list_posts');
  Route::get('/edit_post/{id}', 'PostsController@edit_post')->name('edit_post');
  Route::post('/update_post/{id}', 'PostsController@update_post')->name('update_post');
  Route::get('/delete_post/{id}', 'PostsController@delete_post')->name('delete_post');
  Route::get('/create_category', 'CategoriesController@create_category')->name('create_category');
  Route::get('/create_tag', 'TagsController@create_tag')->name('create_tag');
  Route::post('/save_post', 'PostsController@save_post')->name('save_post');
  Route::post('/save_cat', 'CategoriesController@save_cat')->name('save_cat');
  Route::post('/save_tag', 'TagsController@save_tag')->name('save_tag');
  Route::get('/delete_cat/{id}', 'CategoriesController@delete_cat')->name('delete_cat');
  Route::get('/edit_cat/{id}', 'CategoriesController@edit_cat')->name('edit_cat');
  Route::post('/update_cat/{id}', 'CategoriesController@update_cat')->name('update_cat');
  Route::get('/delete_tag/{id}', 'TagsController@delete_tag')->name('delete_tag');
  Route::get('/edit_tag/{id}', 'TagsController@edit_tag')->name('edit_tag');
  Route::post('/update_tag/{id}', 'TagsController@update_tag')->name('update_tag');
});
