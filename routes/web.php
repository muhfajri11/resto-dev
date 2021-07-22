<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('/foods', 'ProductController@index');
Route::post('/foodSearch', 'ProductController@search');
Route::post('/getFood', 'ProductController@getFood');
Route::post('/addCart', 'ProductController@addCart');

Route::get('/cart', 'CartController@index');

Auth::routes();