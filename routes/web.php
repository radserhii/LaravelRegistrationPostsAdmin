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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::get('/inactive/{id}', 'AdminController@inactiveUser');
    Route::get('/active/{id}', 'AdminController@activeUser');
});

Route::get('posts', 'PostController@index')->name('posts');
Route::post('post', 'PostController@addPost')->name('add_post');
Route::get('delpost/{id}', 'PostController@deletePost')->name('delete_post');
Route::get('uppost/{id}', 'PostController@showUpdatePost')->name('show_update_post');
Route::post('uppost', 'PostController@UpdatePost')->name('update_post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

