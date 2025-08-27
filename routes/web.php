<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('customers')->group(function () {
    Route::get('export', [CustomerController::class, 'export'])->name('customers.export');
});
Route::resource('customers', CustomerController::class);
