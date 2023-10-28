<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\addRoomController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/addAddress', [AdressController::class, 'getAddress'])->name('getAddress');
Route::get('/addRoom', [addRoomController::class, 'getAddress'])->name('getAddressRoom');




