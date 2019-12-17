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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/category', 'CategoryController');

Route::resource('/subcategory', 'SubCategoryController');
// Route::get('/category', 'CategoryController@index');

//  Route::post('/category/add', 'CategoryController@store');

//  Route::get('/home', 'HomeController@index')->name('home');


