<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/post', PostController::class, [
    'only' => ['index', "show"], "parameters" => ['post' => 'postagens']])->middleware('auth:sanctum');

    