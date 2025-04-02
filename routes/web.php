<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOfferController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas abertas para visualização de produtos, ofertas e categorias
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('product-offers', ProductOfferController::class)->only(['index', 'show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

// Rotas protegidas para vendedores
Route::middleware(['auth', 'seller'])->group(function () {
    Route::resource('products', ProductController::class)->only(['create', 'store']); // Apenas criar produtos
    Route::resource('product-offers', ProductOfferController::class)->except(['index', 'show']); // CRUD completo de ofertas
});

// Rotas protegidas para o carrinho (apenas usuários autenticados)
Route::middleware(['auth'])->group(function () {
    Route::resource('cart-items', CartItemController::class);
});

require __DIR__.'/auth.php';
