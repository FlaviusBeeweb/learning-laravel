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

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ceva', ['middleware' => 'manager', function () {
    return "This page can be viewed by managers only";
}]);