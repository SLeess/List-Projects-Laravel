<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function cleanUpperCaseString($next){
        //remover os espaços em branco no inicio e no fim de uma string
        //converter a string para upper case
        return strtoupper($next);
    }
}
