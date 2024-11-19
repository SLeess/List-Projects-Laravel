<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\View\View;

use App\Http\Requests\StoreUpdateExercisesRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    // apresentar a página inicial
    public function index(): \Illuminate\Contracts\View\View
    {
        return view("Home");
    }

    // gerar os exercícios
    public function generateExercises(StoreUpdateExercisesRequest $request){
        $data = $request->validated();
        // dd($data);

        // dd($data, $data->fails());

        // if ($data->fails()){
        //     return redirect()->back()->withErrors($data)->withInput();
        // }
    }

    // exportar os exercícios para uma página que poderá ser imprimida
    public function printExercises(){
    }

    // exportar os exercícios para um arquivo texto
    public function exportExercises(){
    }

}
