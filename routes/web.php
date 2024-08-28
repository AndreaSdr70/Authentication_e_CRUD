<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


//PublicController
Route::get('/', [PublicController::class, 'home'])->name('home');

//ProductController
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');