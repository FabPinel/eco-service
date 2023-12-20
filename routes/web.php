<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\productController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('companies', CompanyController::class);

Route::get('/category', function () {
    return view('shop.category');
});

Route::get('dashboard', function () {
    return view('admin.dashboard');
});

// Produits

Route::get('/admin/index', [productController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [productController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [productController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{id}', [productController::class, 'show'])->name('admin.products.show');
Route::get('/admin/products/edit/{id}', [productController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{id}', [productController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{id}', [productController::class, 'destroy'])->name('admin.products.destroy');

// Catégories
Route::get('/admin/category/create', [productController::class, 'createCategory'])->name('admin.category.create');
Route::post('/admin/category', [productController::class, 'storeCategory'])->name('admin.category.store');
Route::delete('/admin/category/{id}', [productController::class, 'destroyCategory'])->name('admin.category.destroy');
