<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([EndMiddleware::class, StartMiddleware::class])->group(function () {
    Route::get("/", function(){
        echo "<p>Index</p>";
    })->name("index");

    // Route::get("/about", function(){
    //     echo "<p>about</p>";
    // })->name("about")->withoutMiddleware([EndMiddleware::class]);

    Route::get("/contact", function(){
        echo "<p>contact</p>";
    })->name("contact");
});

Route::middleware(['correr_antes'])->group(function () {
    Route::get("/about", function(){
        echo "<p>about</p>";
    })->name("about");
});
