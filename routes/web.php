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


//Admin
Route::get('/admin','AdminControler@index');
Route::get('/dashboard','AdminControler@show_dashboard');
Route::post('/admin-dashboard','AdminControler@dashboard');
Route::get('/logout','AdminControler@logout');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{product_id}','CategoryProduct@delete_category_product');
Route::get('/list-category-product','CategoryProduct@list_category_product');

Route::get('/active-category-product/{product_id}','CategoryProduct@active_category_product');
Route::get('/unactive-category-product/{product_id}','CategoryProduct@unactive_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{product_id}','CategoryProduct@update_category_product');

