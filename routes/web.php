<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product\ProductController;

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
Route::resource('products',ProductController::class);
});
