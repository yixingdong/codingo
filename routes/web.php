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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('posts','PostController@index');

Route::get('post/{post}','PostController@show');

Route::resource('comment','CommentController');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
