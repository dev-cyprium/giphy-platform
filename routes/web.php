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

Route::get('/','PostController@index');
Route::post('/post/create', 'PostController@store')->name('create-post');
Route::get('/posts', 'PostController@index')->name('posts');
Route::post('/login', 'SessionController@login')->name('do-login');
Route::get('/logout', 'SessionController@logout')->name('do-logout');
Route::delete('/post/{id}', 'PostController@delete')->name('delete-post');