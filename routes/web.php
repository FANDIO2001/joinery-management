<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\CustomerPortalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionCalendarController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProductionTaskController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StockAlertController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockMaterialController;
use App\Http\Controllers\StockMovementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerStore']);
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendReset'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'resetForm'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'resetStore'])->name('password.store');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Customer Portal
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('dashboard', [CustomerPortalController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [CustomerPortalController::class, 'profile'])->name('profile');
    Route::get('addresses', [CustomerPortalController::class, 'addresses'])->name('addresses');
    Route::resource('orders', CustomerOrderController::class)->only(['index', 'show']);
});

// Resource Routes (CRUD)
Route::resource('customers', CustomerController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('quotes', QuoteController::class);
Route::resource('invoices', InvoiceController::class)->only(['index', 'create', 'store', 'show']);
Route::resource('production', ProductionController::class);
Route::resource('stocks', StockController::class);

// Nested Resources
Route::resource('employees.leaves', EmployeeLeaveController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('production.tasks', ProductionTaskController::class)->only(['index', 'edit', 'update']);

// Special Routes
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::get('company', [SettingsController::class, 'company'])->name('company');
    Route::post('company', [SettingsController::class, 'updateCompany'])->name('company.update');
    Route::get('categories', [SettingsController::class, 'categories'])->name('categories');
    Route::post('categories', [SettingsController::class, 'updateCategories'])->name('categories.update');
    Route::get('materials', [SettingsController::class, 'materials'])->name('materials');
    Route::post('materials', [SettingsController::class, 'updateMaterials'])->name('materials.update');
});

Route::prefix('stocks')->name('stocks.')->group(function () {
    Route::get('alerts', [StockAlertController::class, 'index'])->name('alerts');
    Route::get('materials', [StockMaterialController::class, 'index'])->name('materials');
    Route::get('movements', [StockMovementController::class, 'index'])->name('movements');
});

Route::prefix('production')->name('production.')->group(function () {
    Route::get('calendar', [ProductionCalendarController::class, 'index'])->name('calendar');
});

Route::prefix('reports')->name('reports.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
});

// Shop (Public/Customer)
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::get('{product}', [ShopController::class, 'show'])->name('show');
    Route::get('{product}/customize', [ShopController::class, 'customize'])->name('customize');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
});

// PDF Routes
Route::get('invoices/{invoice}/pdf', [InvoiceController::class, 'pdf'])->name('invoices.pdf');
Route::get('quotes/{quote}/pdf', [QuoteController::class, 'pdf'])->name('quotes.pdf');