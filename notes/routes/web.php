<?php

// use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
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

    Route::get('/notes/create', [NoteController::class,'create'])->name('note.create');
    Route::post('/notes', [NoteController::class,'store'])->name('note.store');
    Route::get('/notes/{note}/edit', [NoteController::class,'edit'])->name('note.edit');
    Route::patch('/notes', [NoteController::class,'update'])->name('note.update');
    Route::delete('/notes/{note}', [NoteController::class,'destroy'])->name('note.destroy');

    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
});
