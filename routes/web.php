<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaterQualityController;

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/', [WaterQualityController::class, 'index'])->name('display');
