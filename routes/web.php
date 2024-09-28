<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('switchprints.dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'viewDashboard'])->name('dashboard');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('branches', App\Http\Controllers\BranchController::class)->names('branches');
    Route::resource('staffs', App\Http\Controllers\UserController::class)->names('staffs');
    Route::resource('designs', App\Http\Controllers\DesignController::class)->names('designs');
    Route::resource('orders', App\Http\Controllers\OrderController::class)->names('orders');
    Route::resource('customers', App\Http\Controllers\CustomerController::class)->names('customers');
    Route::resource('machines', App\Http\Controllers\MachineController::class)->names('machines');
    Route::resource('payments', App\Http\Controllers\PaymentController::class)->names('payments');

    Route::get('get-customer-info', [App\Http\Controllers\CustomerController::class, 'getCustomerInfo']);
    Route::get('get-edd', [App\Http\Controllers\OrderController::class, 'getEdd']);

    Route::get('/assign-shifts', [App\Http\Controllers\ShiftController::class, 'viewForm'])->name('shifts.assign.view');
    Route::post('/assign-shifts', [App\Http\Controllers\ShiftController::class, 'assignShift'])->name('shifts.assign');
    Route::delete('/shifts/remove/{id}', [App\Http\Controllers\ShiftController::class, 'removeShift'])->name('shifts.remove');

    Route::post('update-job-status', [App\Http\Controllers\OrderController::class, 'updateJobStatus'])->name('job.updateStatus');
});

require __DIR__.'/auth.php';
