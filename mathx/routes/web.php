<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "App MathX";
});

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/generate', 'generateExercises')->name('generate');
    Route::get('/print-exercises', 'printExercises')->name('print');
    Route::get('/export-exercises', 'exportExercises')->name('export');
});

