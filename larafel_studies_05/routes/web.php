<?php

use App\Http\Controllers\MainController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'eloquentRelations']);

app('router')->localizedGroup(function () {

    Route::controller(MainController::class)->group(function(){
        Route::get('/one_to_one', 'OneToOne');
        Route::get('/many_to_many', 'ManyToMany')->name('many_to_many');
        Route::get('/runningQueries', 'RunningQueries')->name('running_queries');
        Route::get('/SameResults', 'SameResults')->name('same_results');
        Route::get('/Collections', 'Collections')->name('collections');
    });


    Route::get('/teste', function(){
        echo __('pagination.previous');
    });


    Route::view('/test', 'test');
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
