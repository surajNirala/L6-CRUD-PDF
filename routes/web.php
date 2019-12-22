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

Route::get('/', 'BookController@index');

Route::resource('books', 'BookController');
Route::get('downloadfullPDF','BookController@downloadfullPDF')->name('downloadfullPDF');
Route::get('downloadPDF/{id}', 'BookController@downloadPDF');


Auth::routes();

// Route::get('/home', 'BookController@index')->name('home');
