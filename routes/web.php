<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepalaSuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NamaTandaTanganController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/users', UserController::class);
Route::resource('/kepalasurat', KepalaSuratController::class);
Route::resource('/suratkeluar', SuratKeluarController::class);
Route::resource('/namatandatangan', NamaTandaTanganController::class);
Route::resource('/suratmasuk', SuratMasukController::class);
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');


// Route::get('/suratmasuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
// Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');