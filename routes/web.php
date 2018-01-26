<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Override default login routes
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');

Route::get('admin', 'AdminController@home')->name('admin.home');
Route::get('home', 'UserController@home')->name('user.home');

Route::prefix('property')->group(function () {
    Route::get('/', 'PropertyController@index')->name('property.index');
    Route::get('profile', 'PropertyController@profile')->name('property.profile');
});