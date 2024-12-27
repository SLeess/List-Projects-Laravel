<?php

use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;


Route::controller(MainController::class)->group(function(){
    //before the game
    Route::get('/', 'startGame')->name('start_game');
    Route::post('/', 'prepareGame')->name('prepare_game');


    //in game
    Route::get('/game', 'game')->name('game');

    Route::get('/answer/{answer}', 'answer')->name('answer');
    Route::get("/final_results", "final_results")->name("final_results");
});
