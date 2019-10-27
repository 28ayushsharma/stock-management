<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('home', 'HomeController@index');
Route::get('dashboard', 'ProductController@index');
Route::get('add-product', [
    'as' => 'addproduct',
    'uses' => 'ProductController@create'
]);

Route::post('add-category', [
    'as' => 'addcategory',
    'uses' => 'ProductController@addcategory'
]);
Route::post('store-product', [
    'as' => 'storeproduct',
    'uses' => 'ProductController@storeproduct'
]);

Route::get('view-all-products', [
    'as' => 'viewallproducts',
    'uses' => 'ProductController@viewallproducts'
]);

Route::get('view-product/{id}', [
    'as' => 'viewproduct',
    'uses' => 'ProductController@viewproduct'
]);

Route::get('edit-product/{id}', [
    'as' => 'editproduct',
    'uses' => 'ProductController@editproduct'
]);

Route::post('update-product/{id}', [
    'as' => 'updateproduct',
    'uses' => 'ProductController@updateproduct'
]);
Route::get('sell-product/{id}', [
    'as' => 'sellproduct',
    'uses' => 'ProductController@sellproduct'
]);
Route::post('store-sales/{id}', [
    'as' => 'storesales',
    'uses' => 'ProductController@storesales'
]);
Route::get('low-stock', [
    'as' => 'lowstock',
    'uses' => 'ProductController@lowstock'
]);
Route::get('delete/{id}', [
    'as' => 'delete',
    'uses' => 'ProductController@delete'
]);
