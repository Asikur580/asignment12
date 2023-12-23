<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\tripController;
use Illuminate\Support\Facades\Route;

// home Route
Route::get('/',[homeController::class,'index'])->name('home');

//customer Route

Route::get('/customer',[customerController::class,'index'])->name('customer');
Route::post('/searchTrip',[customerController::class,'searchTrip'])->name('customer.searchTrip');
Route::get('/seatPlan/{id}',[customerController::class,'seatPlan'])->name('customer.seatPlan');
Route::post('/buySeat',[customerController::class,'buySeat'])->name('customer.buySeat');


// location Route
Route::resource('location', locationController::class);


// location Route
Route::resource('trip', tripController::class);






