<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/companies',[CompaniesController::class,'index'])->name('companies');
Route::get('/languages',[LanguageController::class,'index'])->name('languages');