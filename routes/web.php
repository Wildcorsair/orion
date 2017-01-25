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

Route::get('contact', ['as' => 'contactPage', 'uses' => 'Page\PageController@getContact']);
Route::get('about', 'Page\PageController@getAbout');
Route::get('/', 'Page\PageController@getHome');
Route::resource('posts', 'Post\PostController');
