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
//Frontend site
Route::get('/', 'HomeController@index');


//Backendsite

Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin_dashboard', 'AdminController@dashboard');

//admin site 

Route::get('/add-admin', 'AdminController@add_admin');
Route::post('/store-admin', 'AdminController@store_admin');

//fontent category show with product here
 Route::get('/product_by_category/{category_id}', 'HomeController@show_product_by_category');
 Route::get('/view_product/{product_id}', 'HomeController@view_product_details');
 Route::get('/product_by_manufacturer/{manufacturer_id}', 'HomeController@show_product_by_manufacturer');
 Route::post('/add-to-cart', 'CartController@add_to_cart');
 Route::get('/show-cart', 'CartController@show_cart');
 Route::get('/delete-to-cat/{rowId}', 'CartController@delete_to_cat');
 Route::post('/update-cart', 'CartController@update_cart');


 //checkout and login costomer

Route::get('/login-check', 'CheckoutController@login_check');
Route::post('/customer-registration', 'CheckoutController@customer_registration');

Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/save-shipping', 'CheckoutController@save_shipping');

//customer loging and logout
Route::post('/customer-login', 'CheckoutController@customer_login');
Route::get('/customer-logout', 'CheckoutController@customer_logout');

Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');

//manage order in admin panel
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/unactive-order/{order_id}', 'CheckoutController@unactive_order');
Route::get('/active-order/{order_id}', 'CheckoutController@active_order');
Route::get('/view-order/{order_id}', 'CheckoutController@view_order');
Route::get('/delete-order/{order_id}', 'CheckoutController@delete_order');



//category route
//add category
Route::get('/add-category', 'CategoryController@index');
Route::post('/store-category', 'CategoryController@store_category');
//all category
Route::get('/all-category', 'CategoryController@all_category');
Route::get('/unactive-category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active-category/{category_id}', 'CategoryController@active_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');

//manufacturer or brand route
//add-manufacturer
Route::get('/add-manufacturer', 'ManufacturerController@index');
Route::post('/store-manufacturer', 'ManufacturerController@store_manufacturer');

//all manufacturer
Route::get('/all-manufacturer', 'ManufacturerController@all_manufacturer');
Route::get('/unactive-manufacturer/{manufacturer_id}', 'ManufacturerController@unactive_manufacturer');
Route::get('/active-manufacturer/{manufacturer_id}', 'ManufacturerController@active_manufacturer');
Route::get('/edit-manufacturer/{manufacturer_id}', 'ManufacturerController@edit_manufacturer');
Route::post('/update-manufacturer/{manufacturer_id}', 'ManufacturerController@update_manufacturer');
Route::get('/delete-manufacturer/{manufacturer_id}', 'ManufacturerController@delete_manufacturer');

  //add product
Route::get('/add-product', 'ProductController@index');
Route::post('/store-product', 'ProductController@store_product');

//all product 

Route::get('/all-product', 'ProductController@all_product');
Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');


//add slider
Route::get('/add-slider', 'SliderController@index');
Route::post('/store-slider', 'SliderController@store_slider');

//all slider
Route::get('/all-slider', 'SliderController@all_slider');
Route::get('/unactive-slider/{slider_id}', 'SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}', 'SliderController@active_slider');
Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');
