<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){

        //recogemos los valores de la petición ($request)
        // con las siguientes líneas podemos validar
        // los campos para que puedan ser requeridos, únicos, o de
        // algún tipo en específico como el mail

        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'unique:users|email|required',
            'password'=>'required'
        ]);

        //Creación del usuario en la bd
        //esto equivale a un insert into en la base de datos

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'imagen' => ''
        ]);


        //Debemeos autenticar también al usuario

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index',['user'=>Auth::user()->username]);

    }
}


