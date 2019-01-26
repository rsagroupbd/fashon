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

Auth::routes();


Route::get('/','HomeController@index')->name('home');

Route::get('/shop/{cat?}/{subcat?}','HomeController@shop')->name('shop');

Route::get('/product-details/{slug}','HomeController@productdetails')->name('product-details');

Route::get('/cart','CartController@showcart')->name('cart');
Route::get('/addtocart','CartController@add_to_cart')->name('addtocart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::group(['prefix' => 'fashonadmin'], function()
{

	Route::get('/', 'AdminhomeController@index')->name('adminhome');
	Route::resource('user','UserController');

    Route::resource('product','ProductController');

    Route::resource('admincategory','CategoryController');
    Route::resource('product','ProductController');
    Route::resource('color','ColorController');
    /* Account Setting */
	Route::get('/account/changepassword', 'AccountController@changepassword')->name('changepassword');
	Route::get('/account/viewprofile', 'AccountController@viewprofile')->name('viewprofile');
	Route::put('/account/uploadprofileimage/{user}', 'AccountController@uploadprofileimage')->name('uploadprofileimage');
	Route::post('/account/actionchangepassword','AccountController@actionchangepassword')->name('actionchangepassword');


});

Route::resource('user','UserController');




