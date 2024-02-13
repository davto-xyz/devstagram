<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function store(Request $request){
        // dd($request);
        // dd($request->get('name'));

        // Validación
        $this->validate($request,[
            'name'=>'required|min:5',//[required,min:5]
            'username'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'password'=>'required'
        ]);
    }
}
