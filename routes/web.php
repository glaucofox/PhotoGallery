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

Route::get('/', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create');
Route::get('/album/{id}', 'AlbumsController@show');
Route::post('/albums/store', 'AlbumsController@store');

Route::get('/photos/create/{id}', 'PhotosController@create');
Route::get('/photo/{id}', 'PhotosController@show');
Route::get('/photo/edit/{id}', 'PhotosController@edit');
Route::put('/photo/{id}', 'PhotosController@update');
Route::post('/photos/store', 'PhotosController@store');
Route::delete('/photo/{id}', 'PhotosController@destroy');
