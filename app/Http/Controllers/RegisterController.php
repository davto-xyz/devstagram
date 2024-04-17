<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
<<<<<<< HEAD
            'email'=>'required|unique:users|email',
            'password'=>'required|confirmed'
=======
            'email'=>'unique:users|email|required',
            'password'=>'required'
>>>>>>> 7a142de7f1d61a400de5f963e7fd46f4decffc10
        ]);

        //Creación del usuario en la bd
        //esto equivale a un insert into en la base de datos

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password
        ]);


        //Debemeos autenticar también al usuario

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index');

    }
}


