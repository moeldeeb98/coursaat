<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('BackEnd')->prefix('admin')->group(function(){
    Route::get('/', 'Home@index');
//    Route::get('users', 'UsersController@index');
//    Route::get('users/create', 'UsersController@create');
//    Route::post('users', 'UsersController@store');
//    Route::get('users/{id}', 'UsersController@edit');
//    Route::post('users/{id}', 'UsersController@update');
//    Route::get('users/delete/{id}', 'UsersController@delete');

    Route::resource('users', 'UsersController')->except(['show', 'delete']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
