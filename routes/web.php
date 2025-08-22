<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);
Route::get('/customers/export', [CustomerController::class, 'export'])->name('customers.export');