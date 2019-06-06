<?php

use App\Http\Controllers\Backend\Customer\CustomerController;
use App\Http\Controllers\Backend\DashboardController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Customer Routes
Route::get('customer/deleted', [CustomerController::class, 'getDeleted'])->name('customer.deleted');
Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('customer', [CustomerController::class, 'store'])->name('customer.store');
Route::group(['prefix' => 'customer/{customer}'], function () {
    // User
    Route::get('/', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::patch('/', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/', [CustomerController::class, 'destroy'])->name('customer.destroy');

    // Deleted
    Route::get('delete', [CustomerController::class, 'delete'])->name('customer.delete-permanently');
    Route::get('restore', [CustomerController::class, 'restore'])->name('customer.restore');
});