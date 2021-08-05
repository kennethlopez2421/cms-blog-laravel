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


Route::get('/', 'WelcomeController@index')->name('welcome');


Route::get('blog/posts/{post}','Blog\PostsController@show')->name('blog.show');

Route::get('blog/categories/{category}','Blog\PostsController@category')->name('blog.category');
Route::get('blog/tags/{tag}','Blog\PostsController@tag')->name('blog.tag');

Auth::routes();


Route::middleware(['auth'])->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');
    
    Route::resource('posts', 'PostsController')->middleware('auth');

    Route::resource('tags', 'TagsController');
    
    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
    
    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-post');


});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
         
    
});