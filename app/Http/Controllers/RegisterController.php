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
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'unique:users|email|required',
            'password'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        return redirect()->route('posts.index');

    }
}


