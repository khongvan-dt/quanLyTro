<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\AdressController;



Route::get('/pageRegister', function () {
    return view('page-register');
})->name('pageRegister');

Route::get('/', function () {
    return view('page-login');
})->name('pageLogin');

Route::get('/pageError400', function () {
    return view('web.page-error-400');
})->name('pageError400');

Route::middleware(['checkRole::user'])->group(function () {

//check cố tình đăng nhập vào bằng user
    Route::get('/ecomProductList', function () {
        return redirect()->route('pageError400');
    });
   
});

Route::middleware(['checkRole:admin'])->group(function () {   
     Route::get('/ecomProductList', function () {
        return view('admin.ecom-product-list'); 
    })->name('ecomProductList');
    Route::get('/table', function () {
        return view('admin.tables'); 
    })->name('table');
    Route::get('/addAddress', function () {
        return view('admin.addAddress'); 
    })->name('addAddress');
   
});
Route::get('/addAddress', [AdressController::class, 'getAddress'])->name('getAddress'); 
Route::post('/addAddress', [AdressController::class, 'insertAddress'])->name('insertAddress'); 
Route::post('/login', [registerController::class, 'login'])->name('login');
Route::post('/pageRegister', [registerController::class, 'insertRegister'])->name('register');
Route::post('/logout', [registerController::class, 'logout'])->name('logout');