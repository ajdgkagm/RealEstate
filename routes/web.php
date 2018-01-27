<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Override default login routes
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');

Route::get('home', 'UserController@home')->name('user.home');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@home')->name('admin.home');
    Route::get('property/create', 'PropertyController@create')->name('property.create');
    Route::post('property/store', 'PropertyController@store')->name('property.store');
});

Route::prefix('property')->group(function () {
    Route::get('/', 'PropertyController@index')->name('property.index');
    Route::get('profile', 'PropertyController@profile')->name('property.profile');
});