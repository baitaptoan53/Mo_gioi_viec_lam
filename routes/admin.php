<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as ControllersPostController;

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
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/import-csv',[ControllersPostController::class,'importCsv'])->name('import-csv');
    }
);