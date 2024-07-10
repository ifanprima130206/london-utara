<?php

use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Back\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('back.layout._main');
});

Route::prefix('admin')->group(function () {
    
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'news'])->name('index');
    });
});