<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\InfoController::class, 'index']);
Route::get('/valuteinfo', [\App\Http\Controllers\InfoController::class, 'actionValute']);

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index']);
