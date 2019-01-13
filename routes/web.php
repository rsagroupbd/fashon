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

<<<<<<< HEAD
Route::get('/','HomeController@index')->name('home');

Route::get('/category','HomeController@index')->name('category');


Route::get('/product-details', function () {
    return view('product-details');
})->name('product-details');


Route::get('/cart', function () {
    return view('cart');
})->name('cart');


Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::group(['prefix' => 'fashonadmin'], function()
{
    Route::get('/',function(){
    	echo "success";
    });

    Route::resource('admincategory','CategoryController');

});
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> da71b1aa34076d190db246d9715d81fd49d56ff1
