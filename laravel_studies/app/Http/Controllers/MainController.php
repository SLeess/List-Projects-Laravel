<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function about(){

    }

    public function mostrarValor($vaaa, $veee){
        return "$vaaa enviado pela rota $veee";
    }

    public function mostrarPosts($user_id, $post_id){
        //posts do usuárioo com id $user_id
        //post id: $post_id
        return "User $user_id: $post_id";
    }
}
