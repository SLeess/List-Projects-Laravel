<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// assinatura base de uma rota
// Route::verb('uri', callback); - o callback é a ação que vai ser executada quando a rota for acessada

Route::match(["get","post"],"/login", function(Request $request){
    return $request->user();
})->name("login.get.post");

Route::any("/pedido", function(){
    return "Aceita qualquer http verb";
})->name("any");

// Route::prefix("/index")->group(function(){
//     Route::get('', [MainController::class, 'index'])->name('index');
//     Route::get('/about', [MainController::class, 'about'])->name('about');
// });

Route::name('main')->group(function(){
    Route::get('/index', [MainController::class, 'index'])->name('index');
    Route::get('/about', [MainController::class, 'about'])->name('about');
});

Route::redirect('/saltar', '/index'); ///HTTP RESPONSE: 302
Route::permanentRedirect('/saltar2', '/index'); ///HTTP RESPONSE: 301

Route::view('/', 'home', ['myName' => "Joao"])->name('home');

Route::get('/valor/{value}/{Vee}', [MainController::class,'mostrarValor']);

Route::get('/user/{user_id}/post/{post_id}', [MainController::class, 'mostrarPosts'])
        // ->where('user_id', '[A-Za-z0-9]+')
        ->where([
            'user_id' => '[0-9]+',
            'post_id' => '[0-9]+'
        ]);


// Route::resource('/post', PostController::class);
Route::middleware([OnlyAdmin::class])->name('admin.')->group(function () {
    Route::get('/admin/only', function () {
        echo "Apenas administradores";
    })->name('only');
});

Route::controller(UserController::class)->name('user.')->group(function () {
    Route::get("/new", 'new');
    Route::get("/edit", 'edit');
    Route::get("/delete", 'delete');
});


Route::fallback(function () {
    echo "Pagina não encontrada";
});
