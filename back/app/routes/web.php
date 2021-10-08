<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CouponController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/coupons/get', [CouponController::class, 'index'])->name('coupons/get');
Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons/create');
Route::post('/coupons/use', [CouponController::class, 'use'])->name('coupons/use');