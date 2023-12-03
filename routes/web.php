<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\addTotalFloorController;
use App\Http\Controllers\addRoomController;
use App\Http\Controllers\ServiceFeeSummaryController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\tenantController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\pathController;
use App\Http\Controllers\collectDayConTroller;
use App\Http\Controllers\collectDayMoneyController;

Route::get('/pageRegister', function () {
    return view('page-register');
})->name('pageRegister');

Route::get('/', function () {
    return view('page-login');
})->name('pageLogin');

Route::get('/pageError400', function () {
    return view('page-error-400');
})->name('pageError400');


Route::post('/login', [registerController::class, 'login'])->name('login');
Route::post('/pageRegister', [registerController::class, 'insertRegister'])->name('register');
Route::get('/logout', [registerController::class, 'logout'])->name('logout');

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


    Route::get('/Address', function () {
        return view('admin.addAddress'); 
    })->name('addAddres'); 
    Route::post('/Address', [AdressController::class, 'insertAddress'])->name('insertAddress'); 
    Route::get('/editAddress/{id}', [AdressController::class, 'editAddress'])->name('editAddress');
    Route::post('/updateaddress/{id}', [AdressController::class, 'updateAddress'])->name('updateAddress');
    Route::get('/deleteAddress/{id}', [AdressController::class, 'deleteAddress'])->name('deleteAddress');
    Route::get('/Address', [AdressController::class, 'getAddress'])->name('addAddres');


    Route::get('/TotalFloor', function () {
            return view('admin.addFloor'); 
    })->name('addTotalFloor'); 
    Route::get('/TotalFloor', [addTotalFloorController::class, 'getFloor'])->name('addTotalFloor');
    Route::post('/TotalFloor', [addTotalFloorController::class, 'insertFloor'])->name('insertFloor'); 
    Route::get('/deleteFloor/{id}',[addTotalFloorController::class, 'deleteFloor'])->name('deleteFloor');
    Route::get('/get-number-floors', [addRoomController::class, 'getNumberFloors'])->name('getNumberFloors');


    Route::get('/Room', function () {
        return view('admin.addRoom'); 
    })->name('addRoom'); 
    Route::get('/Room', [addRoomController::class, 'getAddress'])->name('addRoom');
    Route::get('/get-number-floors', [addRoomController::class, 'getNumberFloors']);
    Route::post('/Room', [addRoomController::class, 'insertRoom'])->name('insertRoom');
    Route::get('/deleteRoom/{id}', [addRoomController::class, 'DeleteId'])->name('DeleteId');

    Route::get('/ServiceFeeSummary', function () {
        return view('admin.addServiceFeeSummary'); 
    })->name('ServiceFeeSummary'); 
    Route::post('/ServiceFeeSummary', [ServiceFeeSummaryController::class, 'insertServiceFeeSummary'])->name('insertServiceFeeSummary'); 
    Route::get('/ServiceFeeSummary', [ServiceFeeSummaryController::class, 'getServiceFeeSummary'])->name('addServiceFeeSummary');
    Route::get('/deleteServiceFeeSummary/{id}',[ServiceFeeSummaryController::class, 'deleteServiceFeeSummary'])->name('deleteServiceFeeSummary');
    Route::get('/editServiceFeeSummary/{id}', [ServiceFeeSummaryController::class, 'editServiceFeeSummary'])->name('editServiceFeeSummary');
    Route::post('/updateServiceFeeSummary/{id}', [ServiceFeeSummaryController::class, 'updateServiceFeeSummary'])->name('updateServiceFeeSummary');

    Route::get('/services', function () {
        return view('admin.services'); 
    })->name('addservices'); 
    Route::get('/services', [servicesController::class, 'getServices'])->name('addservices');
    Route::post('/services', [servicesController::class, 'insertService'])->name('insertService');
    Route::get('/deleteService/{id}',[servicesController::class, 'deleteService'])->name('deleteService');
    Route::get('/editService/{id}', [servicesController::class, 'editService'])->name('editService');
    Route::post('/updateServices/{id}', [servicesController::class, 'updateServices'])->name('updateServices');

    Route::get('/addTenant', function () {
        return view('admin.tenant'); 
    })->name('tenant');
    Route::get('/addTenant', [tenantController::class, 'getDisplay'])->name('tenant');
    Route::post('/insertTenant', [tenantController::class, 'insertTenant'])->name('insertTenant'); 
    Route::get('/deleteContract/{id}', [tenantController::class, 'deleteContract'])->name('deleteContract');
    Route::get('/successDownload', [tenantController::class, 'exportToWord'])->name('exportToWord');

    Route::get('/Path', function () {
        return view('admin.Path'); 
    })->name('Path');
    Route::get('/Path', [pathController::class, 'getPath'])->name('Path');
    Route::post('/insertPath', [pathController::class, 'insertPath'])->name('insertPath');
    Route::get('/deletePath/{id}', [pathController::class, 'deletePath'])->name('deletePath');

    Route::get('/addCollectmoney', function () {
        return view('admin.addCollectmoney'); 
    })->name('collectmoney');
   Route::get('/addCollectmoney', [collectDayMoneyController::class, 'getCollectmoney'])->name('collectmoney');
   Route::post('/insertCollectDayMoney', [collectDayMoneyController::class, 'insertCollectDayMoney'])->name('insertCollectDayMoney');
   Route::get('/DeleteCollectmoney/{id}', [collectDayMoneyController::class, 'deleteCollectmoney'])->name('deleteCollectmoney');

   Route::get('/homeFa', function () {
    return view('admin.homeFa'); 
   })->name('homeFa');
});

