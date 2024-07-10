<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Back\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->name('auth.')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store_login', [AuthController::class, 'store_login'])->name('store_login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    
    Route::prefix('users')->name('users.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('news')->name('news.')->group(function () {
        
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/store', [NewsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [NewsController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
    });
});