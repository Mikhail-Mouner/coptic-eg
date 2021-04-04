<?php

use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\Auth\SocialAccountController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LockScreenController;
use \App\Http\Controllers\Admin\HomeContoller as HomeAdmin;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\TagController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\CourseController;

Auth::routes();
Route::middleware('guest')->group(function (){
    Route::get('/login/{provider}', [SocialAccountController::class, 'redirect'])->name('login.provider');
    Route::get('/login/{provider}/callback', [SocialAccountController::class, 'callback']);
});
Route::middleware('auth')->group(function (){

    Route::get('/lockscreen', [LockScreenController::class, 'lock'])->name('lockscreen');
    Route::post('/lockscreen', [LockScreenController::class, 'unlock'])->name('unlock');
    Route::middleware('lock')->group(function (){
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/search', [HomeController::class, 'search'])->name('search');
        Route::get('/categories/{id}', [HomeController::class, 'category'])->name('category');
        Route::get('/courses/{slug}/details', [CourseController::class, 'show'])->name('course.details');

        Route::middleware('isAdmin')->name('admin.')->prefix('admin')->group(function (){
            Route::get('/', [HomeAdmin::class, 'index'])->name('home');

            Route::prefix('categories')->name('categories.')->group(function (){
                Route::get('/', [CategoryController::class,'index'])->name('index');
                Route::post('/', [CategoryController::class,'store'])->name('store');
                Route::put('/{id}', [CategoryController::class,'update'])->name('update');
                Route::delete('/{id}', [CategoryController::class,'destroy'])->name('destroy');
            });

            Route::prefix('tags')->name('tags.')->group(function (){
                Route::get('/', [TagController::class,'index'])->name('index');
                Route::post('/', [TagController::class,'store'])->name('store');
                Route::put('/{id}', [TagController::class,'update'])->name('update');
                Route::delete('/{id}', [TagController::class,'destroy'])->name('destroy');
            });

            Route::prefix('users')->name('users.')->group(function (){
                Route::get('/', [UserController::class,'index'])->name('index');
                Route::get('/create', [UserController::class,'create'])->name('create');
                Route::post('/', [UserController::class,'store'])->name('store');
                Route::get('/{id}', [UserController::class,'edit'])->name('edit');
                Route::put('/{id}', [UserController::class,'update'])->name('update');
                Route::delete('/{id}', [UserController::class,'destroy'])->name('destroy');
            });

            Route::prefix('courses')->name('courses.')->group(function (){
                Route::get('/', [CourseController::class,'index'])->name('index');
                Route::get('/create', [CourseController::class,'create'])->name('create');
                Route::post('/', [CourseController::class,'store'])->name('store');
                Route::get('/{id}', [CourseController::class,'edit'])->name('edit');
                Route::put('/{id}', [CourseController::class,'update'])->name('update');
                Route::delete('/{id}', [CourseController::class,'destroy'])->name('destroy');
            });

        });
    });
});



