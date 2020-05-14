<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('BackEnd')->prefix('admin')->group(function(){
    Route::get('/', 'Home@index');
    Route::get('users', 'UsersController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
