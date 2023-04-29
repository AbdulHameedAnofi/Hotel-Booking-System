<?php

use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\InvoiceController;

Route::get('/', [HomeController::class,'index'])->name('welcome');
Route::get('signin', [LoginController::class,'loginFrom'])->name('front.login');
Route::post('signin', [LoginController::class,'login']);
Route::get('register', [LoginController::class,'register'])->name('front.register');
Route::post('register', [LoginController::class,'processRegister']);
Route::get('verify/{token}', [LoginController::class,'veriyEmail'])->name('verify.email');

Route::get('search/room', [BookingController::class,'checkRoomStatus'])
->name('room.search');

Route::get('complete/payment', [BookingController::class,'payment'])
->name('payment')->middleware('auth');
Route::post('complete/payment', [BookingController::class,'completeBooking'])->name('payment.complete')->middleware('auth');
Route::get('my/booking', [BookingController::class,'myBooking'])->name('myBooking')->middleware('auth');
Route::get('invoice/{booking}', [InvoiceController::class,'invoice'])->name('invoice')->middleware('auth');