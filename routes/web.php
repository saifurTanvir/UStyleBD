<?php

use App\Husband;
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
    return view('Customer.index');
});

Route::get('/index', function () {
    return view('Customer.index');
});

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

