<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('language', App\Http\Controllers\AddController::class);
Route::resource('article', App\Http\Controllers\ArticleController::class);
Route::post('/getarticle',[App\Http\Controllers\HomeController::class, 'articleLanguage']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
