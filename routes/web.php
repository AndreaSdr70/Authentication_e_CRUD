<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');