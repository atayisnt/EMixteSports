<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ProduitController as AdminProduitController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Front Routes
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/category/{categorie}', [ProductController::class, 'byCategory'])->name('products.category');
Route::get('/products/latest', [ProductController::class, 'latest'])->name('products.latest');
Route::get('/products/{produit}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'all'])->name('products.all');

// Admin Routes
Route::prefix('admin')
    ->middleware(['auth', AdminMiddleware::class])
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('categories', CategorieController::class)->names('admin.categories');
        Route::resource('produits', AdminProduitController::class)->names('admin.products');
    });

// Authentication Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
