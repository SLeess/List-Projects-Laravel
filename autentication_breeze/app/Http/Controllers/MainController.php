<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(){

    }

    public function index(): View
    {
        return view('newPage');
    }
}
