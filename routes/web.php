<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\discountController;
use App\Http\Controllers\diyController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ShopController;


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

Route::get('/zero-dechet', function () {
    return view('zeroWaste.index');
});

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/register', function () {
    return view('auth.register');
});
Route::post('register', [AuthController::class, 'store'])->name('register.store');

Route::get('verify/{token}', [AuthController::class, 'verify']);

//Boutique
// Fiche produit
Route::get('/boutique/{id}', [shopController::class, 'getProductById'])->name('shop.productName');

// Admin
// Produits
Route::get('/admin/produits', [productController::class, 'index'])->name('admin.products.index');
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

//DIY
Route::get('admin/diy', function () {
    return view('admin.diy.index');
});
Route::get('/admin/diy/index', [diyController::class, 'index'])->name('admin.diy.index');
Route::get('/admin/diy/create', [diyController::class, 'create'])->name('admin.diy.create');
Route::post('/admin/diy', [diyController::class, 'store'])->name('admin.diy.store');
Route::delete('/admin/diy/{id}', [diyController::class, 'destroy'])->name('admin.diy.destroy');
Route::get('/admin/diy/edit/{id}', [diyController::class, 'edit'])->name('admin.diy.edit');
Route::put('/admin/diy/{id}', [diyController::class, 'update'])->name('admin.diy.update');

//Panier
Route::get('/panier', function () {
    return view('shop.panier');
});
