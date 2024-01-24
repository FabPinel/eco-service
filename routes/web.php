<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\productController;
use App\Http\Controllers\discountController;
use App\Models\Product;

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
Route::put('/admin/products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('admin.products.toggle-status');

// Catégories
Route::get('/admin/category/create', [productController::class, 'createCategory'])->name('admin.category.create');
Route::post('/admin/category', [productController::class, 'storeCategory'])->name('admin.category.store');
Route::delete('/admin/category/{id}', [productController::class, 'destroyCategory'])->name('admin.category.destroy');
Route::get('/admin/category/edit/{id}', [productController::class, 'editCategory'])->name('admin.category.edit');
Route::put('/admin/category/{id}', [productController::class, 'updateCategory'])->name('admin.category.update');

//Promo
Route::get('/admin/discounts/create', [discountController::class, 'create'])->name('admin.discounts.create');
Route::post('/admin/discounts', [discountController::class, 'store'])->name('admin.discounts.store');
Route::delete('/admin/discounts/{id}', [discountController::class, 'destroy'])->name('admin.discounts.destroy');
Route::get('/admin/discounts/edit/{id}', [discountController::class, 'edit'])->name('admin.discounts.edit');
Route::put('/admin/discounts/{id}', [discountController::class, 'update'])->name('admin.discounts.update');
Route::put('/admin/discounts/{id}/toggle-status', [discountController::class, 'toggleStatus'])->name('admin.discounts.toggle-status');
