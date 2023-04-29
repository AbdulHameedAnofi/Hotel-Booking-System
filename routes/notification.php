<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('mark');

Route::get('/delete/notification/{id}', function($id){
    DB::table('notifications')->whereId($id)->delete();
	return redirect()->back();
})->name('notification.delete');