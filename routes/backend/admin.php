<?php

use App\Http\Controllers\Backend\Customer\CustomerController;
use App\Http\Controllers\Backend\DashboardController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Customer Routes
Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
