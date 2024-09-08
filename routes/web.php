<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'viewDashboard'])->name('dashboard');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('branches', App\Http\Controllers\BranchController::class)->names('branches');
    Route::resource('staffs', App\Http\Controllers\UserController::class)->names('staffs');
    Route::resource('styles', App\Http\Controllers\StyleController::class)->names('styles');
    Route::resource('orders', App\Http\Controllers\OrderController::class)->names('orders');
    Route::resource('customers', App\Http\Controllers\CustomerController::class)->names('customers');
    Route::resource('machines', App\Http\Controllers\MachineController::class)->names('machines');
    Route::resource('payments', App\Http\Controllers\PaymentController::class)->names('payments');

});

require __DIR__.'/auth.php';
