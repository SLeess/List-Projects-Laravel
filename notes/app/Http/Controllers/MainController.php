<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        //load user's notes
        $id = session('user.id');

        // $user = User::findOrFail($id)->toArray();
        // $notes = Note::where('user_id','=',$id)->get()->toArray();
        $notes = User::find($id)->notes()->get()->toArray();

        //show home view
        return view("Home", compact('notes'));
    }

    public function newNote(){
        return view('NewNote');
    }
}
