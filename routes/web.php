<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home.index');
//Route::get('/create', 'HomeController@create')->name('pdf.create');

Route::get('/offline','OfflineController@index');

Route::get('pdf', 'PdfController@index')->name('pdf.index');
Route::get('pdf/{pdf}', 'PdfController@show')->name('pdf.show');
Route::delete('pdf/{pdf}', 'PdfController@destroy')->name('pdf.destroy');
Route::get('/create','PdfController@create')->name('pdf.create');
Route::Post('pdf/store','PdfController@store')->name('pdf.store');
