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
Route::get('/', 'HomeController@index');
Route::post('/uploadcsv','UploadController@csvfileupload');

Route::post('/search/browse','HomeController@browse');
Route::post('/search/filter','HomeController@filter');

Route::get('/new_page/{slug}','HomeController@separate');
