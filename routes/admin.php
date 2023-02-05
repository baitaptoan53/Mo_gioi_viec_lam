<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;

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
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    },
);
Route::group(
    [
        'as' => 'posts.',
        'prefix' => 'posts',
    ],
    function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/{post}', [PostController::class, 'show'])->name('show');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    },
);
