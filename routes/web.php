<?php


Route::get('/', 'productcontroller@index')->name('products.index');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::get('/contact', [
    'as' => 'contact_path',
    'uses' => 'contactscontroller@create'
]);
Route::post('/contact', [
   'as' => 'contact_path',
   'uses' => 'contactscontroller@store'
]);
Auth::routes();
Route::get('/motpass','passcontroller@edit')->name('pass.edit');
Route::patch('/motpass','passcontroller@update')->name('pass.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'ShopController@search')->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/myprofile', 'UsersController@edit')->name('users.edit');
    Route::patch('/myprofile', 'UsersController@update')->name('users.update');
    Route::get('/myorders', 'OrdersController@index')->name('orders.index');
    Route::get('/myorders/{order}', 'OrdersController@show')->name('orders.show');
});
