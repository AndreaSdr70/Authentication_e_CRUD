<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


//PublicController
Route::get('/', [PublicController::class, 'home'])->name('home');

//ProductController
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')-> middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store')-> middleware('auth');

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');

// ArticleController
Route::get('/article/create', [ArticleController::CLass, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/store', [ArticleController::CLass, 'store'])->name('article.store')->middleware('auth');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
//Questo metodo put funziona alla base come il metodo post
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');
//Questo metodo put funziona alla base come il metodo post
Route::delete('article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');