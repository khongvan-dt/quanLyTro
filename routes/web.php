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

Route::get('/pageError400', function () {
    return view('web.page-error-400');
})->name('pageError400');


Route::middleware(['CheckRoleMiddleware::user'])->group(function () {
    
//check cố tình đăng nhập vào bằng user
    Route::get('/ecomProductList', function () {
        return redirect()->route('pageError400');
    });
   
});


Route::middleware(['CheckRoleMiddleware::admin'])->group(function () {
    Route::get('/ecomProductList', function () {
        return view('admin.ecom-product-list'); 
    })->name('ecomProductList');
    
});

