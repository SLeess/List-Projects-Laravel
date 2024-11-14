<?php

// use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

//Auth routes - user is not logged
Route::middleware(CheckIsNotLogged::class)->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name('login.form');
    Route::post('/login', 'App\Http\Controllers\AuthController@loginSubmit')->name('login');
});

//Main routes - user is logged
Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', [MainController::class,'index'])->name('main');
    Route::get('/newNote', [MainController::class,'newNote'])->name('newNote');
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
});
