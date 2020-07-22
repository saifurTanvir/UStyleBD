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
Route::get('/products/{categoryName}/category', 'CategoryController@index')->name('category');

Route::get('/coverImage', 'CoverImageController@create')->name('coverImage.create');
Route::post('/coverImage', 'CoverImageController@update')->name('coverImage.update');

Route::get('/featureProduct', 'FeatureProductMasterController@create')->name('featureProduct.create');
Route::post('/featureProduct', 'FeatureProductMasterController@store')->name('featureProduct.store');
Route::get('/featureProduct/{product}/edit', 'FeatureProductMasterController@edit')->name('featureProduct.edit');
Route::patch('/featureProduct/{product}', 'FeatureProductMasterController@update')->name('featureProduct.update');
Route::get('/featureProduct/{product}/delete', 'FeatureProductMasterController@delete')->name('featureProduct.delete');
Route::delete('/featureProduct/{product}', 'FeatureProductMasterController@destroy')->name('featureProduct.destroy');

Route::get('/newArrival/create', 'NewArrivalController@create')->name('newArrival.create');
Route::post('/newArrival/create', 'NewArrivalController@store')->name('newArrival.store');
Route::get('/newArrival/{product}/edit', 'NewArrivalController@edit')->name('newArrival.edit');
Route::patch('/newArrival/{product}', 'NewArrivalController@update')->name('newArrival.update');
Route::get('/newArrival/{product}/delete', 'NewArrivalController@delete')->name('newArrival.delete');
Route::delete('/newArrival/{product}', 'NewArrivalController@destroy')->name('newArrival.destroy');




Route::get('/productDetails/{product}/featureProduct', 'ProductDetailController@index')->name('productDetail.index');
Route::get('/productDetails/{product}/newArrival', 'ProductDetailController@indexForNewArrival')->name('productDetail.index.newArrival');

Route::get('/productDetails/{productDetail}/edit', 'ProductDetailController@edit')->name('productDetail.edit');
Route::patch('/productDetails/{productDetail}', 'ProductDetailController@update')->name('productDetail.update');

Route::post('/addingCart/{productDetail}', 'AddingCartController@create')->name('addingCart.create');
Route::get('/customer/cart', 'AddingCartController@index')->name('addingCart.index');
Route::get('/customer/cart/{cartId}/delete', 'AddingCartController@delete')->name('cart.delete');

Route::get('/customer/cart/toCheckout', 'CheckoutController@index')->name('checkout.index');

Route::get('/customer/orders','OrderController@index')->name('order.index');



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

Route::get('/admin/orders', 'AdminController@orderIndex')->name('admin.orders');
Route::get('/admin/order/{orderId}/control/{status}', 'AdminController@orderEdit')->name('admin.order.edit');

Route::get('/facebookLogin/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/facebookLogin/callback', 'SocialAuthFacebookController@callback');

Route::get('/googleLogin/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/googleLogin/callback', 'SocialAuthGoogleController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

