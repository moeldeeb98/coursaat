<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('BackEnd')->prefix('admin')->group(function(){
    Route::get('/', 'Home@index');

    Route::resource('users', 'UsersController')->except(['show']);
    Route::resource('categories', 'CategoriesController')->except('show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
