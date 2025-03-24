<?php

use App\Http\Controllers\MainController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


app('router')->localizedGroup(function () {
    Route::get('/', [MainController::class, 'eloquentRelations']);

    Route::controller(MainController::class)->group(function(){
        Route::get('/one_to_one', 'OneToOne');
        Route::get('/many_to_many', 'ManyToMany')->name('many_to_many');
    });


    Route::get('/teste', function(){
        echo __('pagination.previous');
    });
});

// app('router')->localizedGroup(function () {
//     app('router')->get('foo/{bar}', function (string $bar) {
//         return response()->json([
//             $bar => __('Foo'),
//         ]);
//     });
// });

// Route::localizedGroup(function () {
//     app('router')->get('foo/{bar}', function (string $bar) {
//         return response()->json([
//             $bar => __('Range Not Satisfiable'),
//         ]);
//     });
// });
