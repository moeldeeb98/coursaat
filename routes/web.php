<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('frontend.landing');


Route::namespace('BackEnd')->prefix('admin')->group(function(){

    Route::get('/', function (){
       return redirect()->route('admin.home');
    });
    Route::get('home', 'Home@index')->name('admin.home');

    Route::resource('users', 'UsersController')->except(['show']);
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::resource('skills', 'SkillsController')->except('show');
    Route::resource('tags', 'TagsController')->except('show');
    Route::resource('pages', 'PagesController')->except('show');
    Route::resource('videos', 'VideosController')->except('show');
    Route::resource('videos/{video}/comments', 'CommentsController')->except('show', 'create', 'edit');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skill')->name('front.skill');
Route::get('video/{id}', 'HomeController@video')->name('front.video');
Route::get('tag/{id}', 'HomeController@tag')->name('front.tag');
