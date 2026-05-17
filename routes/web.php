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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StockAlertController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockMaterialController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//welcom view is the default view when you access the root URL of the application. It is typically used as a landing page or homepage for the application. The welcome view can contain any content you want, such as a welcome message, links to other parts of the application, or any other information you want to display to users when they first visit your site.
//resources/view/welcome.blade.php
Route::get('/', function () {
    $products = \App\Models\Product::with('images')->latest()->take(10)->get();
    return view('welcome', compact('products'));
});

// Auth Routes
Route::get('login', [AuthController::class, 'login'])->name('login');//a coder dans ressources/views/auth/login.blade.php
Route::post('login', [AuthController::class, 'store']); // a ne pas toucher
Route::get('register', [AuthController::class, 'register'])->name('register'); //a coder dans ressources/views/auth/register.blade.php
Route::post('register', [AuthController::class, 'registerStore']);// a ne pas toucher
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');// a coder dans ressources/views/auth/forgot-password.blade.php
Route::post('forgot-password', [AuthController::class, 'sendReset'])->name('password.email');// a ne pas toucher
Route::get('reset-password/{token}', [AuthController::class, 'resetForm'])->name('password.reset');// a coder dans ressources/views/auth/reset-password.blade.php
Route::post('reset-password', [AuthController::class, 'resetStore'])->name('password.store');// a ne pas toucher   
Route::post('logout', [AuthController::class, 'logout'])->name('logout');// a ne pas toucher
Route::get('users', [UserController::class, 'index'])->name('users.index');// a ne pas toucher
Route::get('users/create', [UserController::class, 'create'])->name('users.create');// a ne pas toucher
Route::post('users', [UserController::class, 'store'])->name('users.store');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('tableau-de-bord', [DashboardController::class, 'index'])->name('dashboard.fr');

// Profile Routes
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
    Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->name('avatar');
});

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
Route::resource('stocks', StockController::class);

// Nested Resources
Route::resource('employees.leaves', EmployeeLeaveController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('production.tasks', ProductionTaskController::class)->only(['index', 'edit', 'update']);

// Leaves standalone routes
Route::prefix('employees/leaves')->name('employees.leaves.')->group(function () {
    Route::get('/', [EmployeeLeaveController::class, 'allLeaves'])->name('all');
    Route::get('calendar', [EmployeeLeaveController::class, 'calendar'])->name('calendar');
});

// Special Routes
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::get('company', [SettingsController::class, 'company'])->name('company');
    Route::post('company', [SettingsController::class, 'updateCompany'])->name('company.update');
    Route::get('categories', [SettingsController::class, 'categories'])->name('categories');
    Route::get('categories/create', [SettingsController::class, 'createCategory'])->name('categories.create');
    Route::post('categories', [SettingsController::class, 'storeCategory'])->name('categories.store');
    Route::get('categories/{category}/edit', [SettingsController::class, 'editCategory'])->name('categories.edit');
    Route::put('categories/{category}', [SettingsController::class, 'updateCategory'])->name('categories.update');
    Route::delete('categories/{category}', [SettingsController::class, 'destroyCategory'])->name('categories.destroy');
    Route::post('categories/update', [SettingsController::class, 'updateCategories'])->name('categories.old-update');
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

// Additional Routes
Route::prefix('deliveries')->name('deliveries.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
});

Route::prefix('sav')->name('sav.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
});

Route::prefix('notifications')->name('notifications.')->group(function () {
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