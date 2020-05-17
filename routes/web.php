<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('BackEnd')->prefix('admin')->group(function(){
    Route::get('/', 'Home@index')->name('admin.home');

    Route::resource('users', 'UsersController')->except(['show']);
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::resource('skills', 'SkillsController')->except('show');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
