<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;


Route::get('/', function () {
    return view('page-register');
})->name('pageRegister');
Route::post('/', [registerController::class,'insertRegister'])->name('register');

Route::get('/login', function () {
    return view('page-login');
})->name('pageLogin');

Route::post('/login', [registerController::class,'login'])->name('login');

Route::middleware(['checkUserRole:user'])->group(function () {
    Route::get('/pageError400', function () {
        return view('web.page-error-400');
    })->name('pageError400');
});


Route::middleware(['checkUserRole:admin'])->group(function () {
    Route::get('/ecomProductList', function () {
        return view('admin.ecom-product-list'); 
    })->name('ecomProductList');
    
});

