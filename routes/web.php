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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'AdminController@index')->name('index');

Route::get('/coverImage', 'CoverImageController@create')->name('coverImage.create');
Route::post('/coverImage', 'CoverImageController@update')->name('coverImage.update');


Route::get('/category', function () {
    return view('Customer.category');
});

Route::get('/blog', function () {
    return view('Customer.blog');
});

Route::get('/aboutUs', function () {
    return view('Customer.aboutUs');
});

Route::get('/contact', function () {
    return view('Customer.contact');
});

Route::get('/facebookLogin/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/facebookLogin/callback', 'SocialAuthFacebookController@callback');

Route::get('/googleLogin/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/googleLogin/callback', 'SocialAuthGoogleController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

