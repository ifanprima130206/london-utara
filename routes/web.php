<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\GalleryController;
use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Back\PopulationController;
use App\Http\Controllers\Back\QusetionController;
use App\Http\Controllers\Back\ScheduleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index']);

Route::prefix('auth')->name('auth.')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('isLoggedin');
    Route::post('/store_login', [AuthController::class, 'store_login'])->name('store_login')->middleware('isLoggedin');
    Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('isLoggedin');
    Route::post('/store_register', [AuthController::class, 'store_register'])->name('store_register')->middleware('isLoggedin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('activation/{token}', [AuthController::class, 'activation'])->name('activation');
});

Route::prefix('admin')->middleware('isNone')->group(function () {

    Route::get('/overview', [DashboardController::class, 'index'])->name('admin');
    
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
    
    Route::prefix('galleries')->name('galleries.')->group(function () {
        
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/store', [GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [GalleryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [GalleryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('schedules')->name('schedules.')->group(function () {
        
        Route::get('/', [ScheduleController::class, 'index'])->name('index');
        Route::get('/create', [ScheduleController::class, 'create'])->name('create');
        Route::post('/store', [ScheduleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ScheduleController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ScheduleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('questions')->name('questions.')->group(function () {
        
        Route::get('/', [QusetionController::class, 'index'])->name('index');
        Route::get('/create', [QusetionController::class, 'create'])->name('create');
        Route::post('/store', [QusetionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [QusetionController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [QusetionController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [QusetionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('populations')->name('populations.')->group(function () {
        
        Route::prefix('unverified')->name('unverified.')->group(function () {
            
            Route::get('/', [PopulationController::class, 'unverified'])->name('index');
            Route::get('/create', [PopulationController::class, 'create'])->name('create');
            Route::post('/store', [PopulationController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PopulationController::class, 'edit'])->name('edit');
            Route::post('/verify/{id}', [PopulationController::class, 'verify'])->name('verify');
            Route::post('/update/{id}', [PopulationController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [PopulationController::class, 'destroy'])->name('destroy');
        });

        Route::get('verified_document/{id}', [PopulationController::class, 'verified_document'])->name('verified_document');

        Route::prefix('verified')->name('verified.')->group(function () {
            
            Route::get('/', [PopulationController::class, 'verified'])->name('index');
        });
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        
        Route::post('/edit/{id}', [QusetionController::class, 'edit'])->name('edit');
    });

});