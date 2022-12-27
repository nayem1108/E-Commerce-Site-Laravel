<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Website routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category-products/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/subcategory-products/{id}', [HomeController::class, 'subcategoryProduct'])->name('subcategory-product');
Route::get('/single-brand-products/{id}', [HomeController::class, 'brandProducts'])->name('brand-products');
Route::get('/single-product-details/{id}', [HomeController::class, 'details'])->name('product-details-info');
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class, 'showCart'])->name('show-cart');
Route::get('/remove-cart-item/{id}', [CartController::class, 'removeItem'])->name('remove-cart-item');
Route::post('/update-cart-quantity/{id}', [CartController::class, 'updateQuantity'])->name('update-cart-quantity');
// Route::post('/add-to-cart-ajax/{id}', [CartController::class, 'addtocartAjax'])->name('add-to-cart-ajax');



// customer routes
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/new-order-checkout', [CheckoutController::class, 'newOrderCheckout'])->name('new-order-checkout');
Route::get('/my-dashboard', [CustomerDashboardController::class, 'dashboard'])->name('my-dashboard');
Route::get('/my-profile', [CustomerDashboardController::class, 'my_profile'])->name('my-profile');

Route::get('/customer-register', [CustomerAuthController::class, 'register'])->name('customer-register');
Route::post('/register-new-customer', [CustomerAuthController::class, 'newCustomer'])->name('register-new-customer');
Route::get('/customer-login', [CustomerAuthController::class, 'login'])->name('customer-login');
Route::post('/customer-request-login', [CustomerAuthController::class, 'loginRequest'])->name('customer-request-login');
Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');


// Admin routes
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'index'])->name('add-category');
    Route::post('/create-category', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('manage-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/detele-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/add-subcategory', [SubCategoryController::class, 'index'])->name('add-sub-category');
    Route::post('/create-subcategory', [SubCategoryController::class, 'create'])->name('subcategory.new');
    Route::get('/manage-subcategory', [SubCategoryController::class, 'manage'])->name('manage-sub-category');
    Route::get('/edit-subcategory/{id}', [SubCategoryController::class, 'edit'])->name('edit-subcategory');
    Route::post('/update-subcategory/{id}', [SubCategoryController::class, 'update'])->name('update-subcategory');
    Route::get('/delete-subcategory/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

    Route::get('/add-brand', [BrandController::class, 'index'])->name('add-brand');
    Route::post('/create-brand', [BrandController::class, 'create'])->name('brand.new');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete-brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/manage-brand', [BrandController::class, 'manage'])->name('manage-brand');

    Route::get('/add-unit', [UnitController::class, 'index'])->name('add-unit');
    Route::post('/create-unit', [UnitController::class, 'create'])->name('unit.new');
    Route::get('/manage-unit', [UnitController::class, 'manage'])->name('manage-unit');
    Route::get('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete');

    Route::get('/add-product', [ProductController::class, 'index'])->name('add-product');
    Route::get('/get-sub-category', [ProductController::class, 'getSubcategory'])->name('product.get-sub-category');
    Route::post('/create-product', [ProductController::class, 'create'])->name('product.new');
    Route::get('/manage-product', [ProductController::class, 'manage'])->name('manage-product');
    Route::get('/product-details/{id}', [ProductController::class, 'viewDetails'])->name('product.view-details');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/manage-order', [OrderController::class, 'index'])->name('manage-order');

    Route::get('/add-user', [UserController::class, 'index'])->name('add-user');
    Route::get('/manage-user', [UserController::class, 'manage'])->name('manage-user');

});
