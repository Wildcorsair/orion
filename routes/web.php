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

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'Blog\BlogController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['as' => 'blog.index', 'uses' => 'Blog\BlogController@getIndex']);
Route::get('contact', ['as' => 'contactPage', 'uses' => 'Page\PageController@getContact']);
Route::post('contact', ['as' => 'contactForm', 'uses' => 'Page\PageController@postContact']);
Route::get('about', 'Page\PageController@getAbout');
Route::get('/', 'Page\PageController@getHome');
Route::resource('posts', 'Post\PostController');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::resource('categories', 'Category\CategoryController', ['except' => ['create']]);
Route::resource('tags', 'Tag\TagController', ['except' => ['create']]);
