<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required'
        ]
    );
    if(!auth()->attempt($request->only('email','password'),$request->remember)){
        return back()->with('mensaje','Credenciales incorrectas');
    }
    return redirect()->route('posts.index',Auth::user()->username);
    }
}
