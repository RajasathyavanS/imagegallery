<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'App\Http\Controllers\ImageController@index')->name('gallery.index');
Route::get('images', 'App\Http\Controllers\ImageController@create')->name('gallery.create');
Route::post('/images/create', 'App\Http\Controllers\ImageController@store')->name('gallery.store');
Route::get('/images/{id}/edit', 'App\Http\Controllers\ImageController@edit')->name('gallery.edit');
Route::get('/galleryview/{id}', 'App\Http\Controllers\ImageController@galleryview')->name('gallery.view');
Route::put('/images/{id}', 'App\Http\Controllers\ImageController@update')->name('gallery.update');
Route::delete('/images/{id}', 'App\Http\Controllers\ImageController@destroy')->name('gallery.destroy');
