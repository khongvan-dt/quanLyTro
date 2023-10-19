<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;


Route::get('/pageRegister', function () {
    return view('page-register');
})->name('pageRegister');
Route::post('/pageRegister', [registerController::class,'insertRegister'])->name('register');



Route::get('/', function () {
    return view('page-login');
})->name('pageLogin');

Route::post('/', [registerController::class,'login'])->name('login');




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
    Route::get('/table', function () {
        return view('admin.tables'); 
    })->name('table');
    Route::get('/addAddress', function () {
        return view('admin.addAddress'); 
    })->name('addAddress');
    Route::get('/data', function () {
        return view('admin.data'); 
    })->name('data');
    
    
});

