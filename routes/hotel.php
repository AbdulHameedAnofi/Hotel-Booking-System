<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomBookedController;

Route::middleware(['auth','authorized','can.install'])->group(function () {

    Route::get('/facilities', [FacilityController::class,'index'])->name('facility.index');
    Route::post('/facility', [FacilityController::class,'store'])->name('facility.store');
    Route::get('/facility/{facility}/edit', [FacilityController::class,'edit'])->name('facility.edit');
    Route::patch('/facility/{facility}/update', [FacilityController::class,'update'])->name('facility.update');
    Route::post('/facility/{facility}/delete', [FacilityController::class,'delete'])->name('facility.delete');

    Route::get('/rooms', [RoomController::class,'index'])->name('room.index');
    Route::post('/room', [RoomController::class,'store'])->name('room.store');
    Route::get('/room/{room}/edit', [RoomController::class,'edit'])->name('room.edit');
    Route::patch('/room/{room}/update', [RoomController::class,'update'])->name('room.update');
    Route::post('/room/{room}/delete', [RoomController::class,'delete'])->name('room.delete');

    Route::get('/types', [TypeController::class,'index'])->name('type.index');
    Route::post('/type', [TypeController::class,'store'])->name('type.store');
    Route::get('/type/{room_type}/edit', [TypeController::class,'edit'])->name('type.edit');
    Route::patch('/type/{room_type}/update', [TypeController::class,'update'])->name('type.update');
    Route::post('/type/{room_type}/delete', [TypeController::class,'delete'])->name('type.delete');

    Route::get('booked/room', [RoomBookedController::class,'index'])->name('booked.room');

});