<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// TAMBAHKAN INI ⬇⬇⬇
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Customer\CustomerVideoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect('/admin')
        : redirect('/customer');
});

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/', fn () => view('admin.dashboard'));

    // Customer CRUD
    Route::resource('customers', AdminCustomerController::class);

    // Video CRUD
    Route::resource('videos', AdminVideoController::class);

    // Request approval
    Route::get('requests', [AdminRequestController::class, 'index']);
    Route::post('requests/{id}/approve', [AdminRequestController::class, 'approve']);
    
    // Revoke izin customer
    Route::delete('requests/{id}/revoke', [AdminRequestController::class, 'revoke']);

    // routes/web.php
    Route::put('requests/{id}/update-duration', [AdminRequestController::class, 'updateDuration']);
    Route::get('requests/count', [AdminRequestController::class, 'countPending']);
    Route::get('requests/ajax', [AdminRequestController::class, 'ajaxRequests']);

});

Route::middleware(['auth','role:customer'])->prefix('customer')->group(function () {

    Route::get('/', fn () => view('customer.dashboard'));

    Route::get('videos', [CustomerVideoController::class, 'index']);
    Route::post('videos/{id}/request', [CustomerVideoController::class, 'requestAccess']);

    Route::get('watch/{id}', [CustomerVideoController::class, 'watch']);
});
