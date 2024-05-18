<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(KaryawanController::class)->group(function () {
    Route::get('karyawans', 'index');
    Route::post('karyawan', 'store');
    Route::get('karyawan/{id}', 'show');
    Route::put('karyawan/{id}', 'update');
    Route::delete('karyawan/{id}', 'destroy');
}); 
