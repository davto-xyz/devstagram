<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user,Post $post){
       //Validar la solicitud del comentario

       $this->validate($request,[
        'comentario' => 'required|max:255'
       ]);
       Comentario::create(
        [
            'comentario' => $request->comentario,
            'user_id' => Auth::user()->id,
            'post_id' => $post->id
        ]
        );

        return back()->with('mensaje','Comentario creado correctamente');
    }
}
