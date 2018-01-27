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
    Route::get('profile/{property}', 'PropertyController@profile')->name('property.profile');
    Route::get('edit/{property}', 'PropertyController@edit')->name('property.edit');
    Route::post('update/{property}', 'PropertyController@update')->name('property.update');
    Route::post('delete', 'PropertyController@destroy')->name('property.destroy');

    Route::get('image/edit/{image}', 'ResourceImageController@edit')->name('image.edit');
    Route::post('image/update/{image}', 'ResourceImageController@update')->name('image.update');
    Route::post('image/delete', 'ResourceImageController@destroy')->name('image.destroy');

    Route::post('message/store', 'MessageController@store')->name('message.store');
});