<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view("Login");
    }

    public function loginSubmit(Request $request){

        $validator = Validator::make($request->all(), [
            "username" => "required|min:3|max:50",
            "password" => "required|min:7|max:16"
        ], [
            'username.required'=> 'username é obrigatório!',
            'username.min'=> 'tamanho mínimo é de 3 caracteres!',
            'password.min'=> 'tamanho mínimo é de 7 caracteres!',
            'password.max'=> 'tamanho máximo é de 16 caracteres!',
            'username.max'=> 'tamanho máximo é de 50 caracteres!',
            'password.required'=> 'password é obrigatório!',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('username', $request->username)
                    ->where('deleted_at', null)
                    ->first();

        if(!$user){
            return redirect()
                 ->back()
                 ->withErrors(
                [
                    'username'=> 'Usuário ou senha incorretos.'
                ],
            )->withInput();
        }

        if(!password_verify( $request->password, $user->password)){
            return back()->withErrors(
                [
                    'password'=> 'Usuário ou senha incorretos.'
                ],
                )->withInput();

        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user'=> [
                'id' => $user->id,
                'username' => $user->username
            ]
            ]);

        $userModel = new User();
        $users = $userModel->all()->toArray();

        //redirect to home page
        return redirect()->route('main');

    }


    public function logout(){
        session()->forget('user');
        return redirect()->route('login.form');
    }
}
