<?php

use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/show_data', [MainController::class, 'showData']);

Route::view('/', 'Home')->name('start_game');
Route::post('/', [MainController::class,'prepareGame'])->name('prepare_game');
