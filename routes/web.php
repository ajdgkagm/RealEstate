<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Override default login routes
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');

Route::get('admin/home', 'AdminController@home')->name('admin.home');
Route::get('home', 'HomeController@index')->name('home');
