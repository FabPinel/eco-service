<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\discountController;
use App\Http\Controllers\diyController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Controller;


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
// Routes générales

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/boutique', function () {
    return view('shop.index');
});
Route::get('/produit', function () {
    return view('shop.products');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/DIY', function () {
    return view('diy.index');
});
Route::get('/diy/{id}', [diyController::class, 'getDiyById'])->name('diy.diyName');
Route::get('/zero-dechet', function () {
    return view('zeroWaste.index');
});
//Auth
Route::post('register', [AuthController::class, 'store'])->name('register.store');
Route::get('verify/{token}', [AuthController::class, 'verify']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Boutique
Route::get('/boutique/{id}', [shopController::class, 'getProductById'])->name('shop.productName');

// Admin - Produits
Route::prefix('/admin/products')->group(function () {
    Route::get('/', [productController::class, 'index'])->name('admin.products.index');
    Route::get('/create', [productController::class, 'create'])->name('admin.products.create');
    Route::post('/', [productController::class, 'store'])->name('admin.products.store');
    Route::get('/{id}', [productController::class, 'show'])->name('admin.products.show');
    Route::get('/edit/{id}', [productController::class, 'edit'])->name('admin.products.edit');
    Route::put('/{id}', [productController::class, 'update'])->name('admin.products.update');
    Route::delete('/{id}', [productController::class, 'destroy'])->name('admin.products.destroy');
    Route::put('/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('admin.products.toggle-status');
})->middleware('auth');

// Admin - Catégories
Route::prefix('/admin/category')->group(function () {
    Route::get('/create', [productController::class, 'createCategory'])->name('admin.category.create');
    Route::post('/', [productController::class, 'storeCategory'])->name('admin.category.store');
    Route::get('/edit/{id}', [productController::class, 'editCategory'])->name('admin.category.edit');
    Route::put('/{id}', [productController::class, 'updateCategory'])->name('admin.category.update');
    Route::delete('/{id}', [productController::class, 'destroyCategory'])->name('admin.category.destroy');
});

// Admin - Promo
Route::prefix('/admin/discounts')->group(function () {
    Route::get('/create', [discountController::class, 'create'])->name('admin.discounts.create');
    Route::post('/', [discountController::class, 'store'])->name('admin.discounts.store');
    Route::get('/edit/{id}', [discountController::class, 'edit'])->name('admin.discounts.edit');
    Route::put('/{id}', [discountController::class, 'update'])->name('admin.discounts.update');
    Route::delete('/{id}', [discountController::class, 'destroy'])->name('admin.discounts.destroy');
    Route::put('/{id}/toggle-status', [discountController::class, 'toggleStatus'])->name('admin.discounts.toggle-status');
});

// Admin - DIY
Route::prefix('/admin/diy')->group(function () {
    Route::get('/', [diyController::class, 'index'])->name('admin.diy.index');
    Route::get('/create', [diyController::class, 'create'])->name('admin.diy.create');
    Route::post('/', [diyController::class, 'store'])->name('admin.diy.store');
    Route::get('/edit/{id}', [diyController::class, 'edit'])->name('admin.diy.edit');
    Route::put('/{id}', [diyController::class, 'update'])->name('admin.diy.update');
    Route::delete('/{id}', [diyController::class, 'destroy'])->name('admin.diy.destroy');
});

// Panier
Route::get('/panier', function () {
    return view('shop.panier');
});
