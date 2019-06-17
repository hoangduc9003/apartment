<?php

use App\Http\Controllers\Backend\Apartment\RoomController;
use App\Http\Controllers\Backend\Customer\CustomerController;
use App\Http\Controllers\Backend\Apartment\ApartmentController;
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
//    Route::get('delete', [CustomerController::class, 'delete'])->name('customer.delete-permanently');
//    Route::get('restore', [CustomerController::class, 'restore'])->name('customer.restore');
});

Route::group(['prefix' => 'customer/{id}'], function () {
    // Deleted
    Route::get('delete', [CustomerController::class, 'delete'])->name('customer.delete-permanently');
    Route::get('restore', [CustomerController::class, 'restore'])->name('customer.restore');
});


// Apartment Routes
Route::get('apartment/deleted', [ApartmentController::class, 'getDeleted'])->name('apartment.deleted');
Route::get('apartment', [ApartmentController::class, 'index'])->name('apartment.index');
Route::get('apartment/create', [ApartmentController::class, 'create'])->name('apartment.create');
Route::post('apartment', [ApartmentController::class, 'store'])->name('apartment.store');
Route::group(['prefix' => 'apartment/{apartment}'], function () {
    // Apartment
    Route::get('/', [ApartmentController::class, 'show'])->name('apartment.show');
    Route::get('edit', [ApartmentController::class, 'edit'])->name('apartment.edit');
    Route::patch('/', [ApartmentController::class, 'update'])->name('apartment.update');
    Route::delete('/', [ApartmentController::class, 'destroy'])->name('apartment.destroy');

});
Route::group(['prefix' => 'apartment/{id}'], function () {
    // Deleted
    Route::get('delete', [ApartmentController::class, 'delete'])->name('apartment.delete-permanently');
    Route::get('restore', [ApartmentController::class, 'restore'])->name('apartment.restore');
});

// Room Routes
Route::get('room/deleted', [RoomController::class, 'getDeleted'])->name('room.deleted');
Route::get('room', [RoomController::class, 'index'])->name('room.index');
Route::get('room/create', [RoomController::class, 'create'])->name('room.create');
Route::post('room', [RoomController::class, 'store'])->name('room.store');
Route::group(['prefix' => 'room/{room}'], function () {
    // Room
    Route::get('/', [RoomController::class, 'show'])->name('room.show');
    Route::get('edit', [RoomController::class, 'edit'])->name('room.edit');
    Route::patch('/', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/', [RoomController::class, 'destroy'])->name('room.destroy');

});
Route::group(['prefix' => 'room/{id}'], function () {
    // Deleted
    Route::get('delete', [RoomController::class, 'delete'])->name('room.delete-permanently');
    Route::get('restore', [RoomController::class, 'restore'])->name('room.restore');
});
