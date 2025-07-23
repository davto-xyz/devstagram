<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('perfil.index');
    }
    public function store(Request $request){
        $request -> request->add(['username' =>Str::slug($request->username)]);
        $this->validate($request,
            [
                'username'=> ['required','unique:users,username,'.Auth::user()->id,'min:3','max:20', 'not_in:editar-perfil'],
                /* 'password'=>['current_password'] */
            ]
        );
        if($request->imagen){
            $img = $request->file('imagen');
            $filename = Str::uuid() . "." . $img->extension();
            
        // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            
            $path = public_path('profile-img'). "/".$filename;
            $image = $manager -> read($img);
            $image->save($path);
        }
        $usuario=User::find(Auth::user()->id);
        $usuario->username=$request->username;
        $usuario->imagen=$filename ?? Auth::user()->imagen ?? '';
        $usuario->email=$request->email;
        


        $usuario->save();

        

        return redirect()->route('posts.index',$usuario->username);
    }
}
