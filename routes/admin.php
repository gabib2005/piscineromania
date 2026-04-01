<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CrmController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin', 'throttle:60,1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Products
    Route::get('/produse', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produse/creare', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produse', [ProductController::class, 'store'])->name('products.store');
    Route::get('/produse/{product}/editare', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produse/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produse/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/produse/import', [ProductController::class, 'import'])->name('products.import');
    Route::post('/produse/bulk', [ProductController::class, 'bulk'])->name('products.bulk');
    Route::get('/produse/export', [ProductController::class, 'export'])->name('products.export');

    // Categories
    Route::get('/categorii', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categorii', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categorii/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categorii/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Orders
    Route::get('/comenzi', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/comenzi/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/comenzi/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.status');
    Route::get('/comenzi/{order}/factura', [OrderController::class, 'invoice'])->name('orders.invoice');

    // CRM
    Route::get('/crm', [CrmController::class, 'index'])->name('crm.index');
    Route::get('/crm/{user}', [CrmController::class, 'show'])->name('crm.show');
    Route::post('/crm/{user}/nota', [CrmController::class, 'addNote'])->name('crm.note');

    // Settings
    Route::get('/setari', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/setari', [SettingsController::class, 'update'])->name('settings.update');
});
