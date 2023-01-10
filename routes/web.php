<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InfoController::class, 'index'])->name('info');
Route::get('/valuteinfo', [InfoController::class, 'actionValute']);

Route::get('/life', function (){
    return view('life');
})->name('life');

Route::get('/news', [NewsController::class,'getNews'])->name('news');
Route::get('/news/{id}', [NewsController::class,'getNewsItem'])->name('news-item');
Route::get('/news-create', [NewsController::class,'createPage'])->name('news-create-page');

Route::post('/news-create', [NewsController::class,'create'])->name('news-create');
Route::post('/news', [NewsController::class,'getNews'])->name('news-search');
Route::post('/news/delete/{id}', [NewsController::class,'delete'])->name('news-delete');

