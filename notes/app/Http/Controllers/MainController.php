<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index(){
        //load user's notes
        $id = session('user.id');

        // $user = User::findOrFail($id)->toArray();
        // $notes = Note::where('user_id','=',$id)->get()->toArray();

        $now = Carbon::now();

        $notes = User::find($id)->notes()->whereNull('deleted_at')->get()->toArray();
        foreach($notes as &$note){
            $note['updated_at'] = ($note['created_at'] != $note['updated_at']) ?
                            $now->diff($note['updated_at'])->format('%d days, %h hours and %i minutes ago.') :
                            null;
            $note['created_at'] = Carbon::parse($note['created_at'])->format('d/m/Y h:i');
            $note['id'] = Crypt::encrypt($note['id']);
        }

        //show home view
        return view("Home", compact('notes'));
    }
}
