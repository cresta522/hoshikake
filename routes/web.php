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

Auth::routes(['register' => false]);

// 以下、ログインユーザのみ
Route::get('edit', 'UserController@edit')->name('edit');
Route::put('/{user}', 'UserController@update')->name('update');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider', 'github');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider', 'github');

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
