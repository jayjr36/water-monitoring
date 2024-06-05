<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaterQualityController;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/display', [WaterQualityController::class, 'index'])->name('display');

Route::get('/updatedata', [WaterQualityController::class, 'index'])->name('display');

Route::get('/water-quality/download-pdf', [WaterQualityController::class, 'downloadPDF'])->name('download');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
