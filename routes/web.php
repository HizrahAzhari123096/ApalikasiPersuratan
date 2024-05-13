<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/kepalasurat', \App\Http\Controllers\KepalaSuratController::class);
Route::resource('/namatandatangan', \App\Http\Controllers\NamaTandaTanganController::class);
Route::resource('/users', \App\Http\Controllers\UserController::class);