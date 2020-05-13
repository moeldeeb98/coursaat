<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('BackEnd')->prefix('admin')->group(function(){
    Route::get('/', 'Home@index');
});
