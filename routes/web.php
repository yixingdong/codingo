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

Route::get('post/{slug}','PostController@show');

Route::get('courses','CourseController@index');

Route::get('course/{slug}','CourseController@show');

Route::get('lesson/{slug}','LessonController@show');

Route::get('lessons','LessonController@index');

Route::resource('comment','CommentController');

Route::get('sitemap','SiteController@sitemap');

Route::group(['prefix' => 'admin-coding'], function () {
    Voyager::routes();
});


