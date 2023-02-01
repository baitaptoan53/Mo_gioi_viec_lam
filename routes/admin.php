<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.master');
})->name('welcome');

Route::group(['name'=>'users.'],routes:function(){
    Route::get('/',[UserController::class,'index'])->name('index');
});