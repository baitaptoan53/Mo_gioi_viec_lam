<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('layouts.master');
})->name('welcome');

Route::group(
    [
        'as' => 'users.',
        'prefix' => 'users',
    ],
    function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    },
);
