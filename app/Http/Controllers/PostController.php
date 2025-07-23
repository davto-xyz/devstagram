<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }
    public function index(User $user){


        $posts=Post::where('user_id',$user->id)->latest()->paginate(20);

        
        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function create()
    {
       return view('posts.create');
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'titulo'=> 'required|string|max:255',
                'descripcion' => 'required|string',
                'imagen'=>'required'
            ]
        );
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('posts.index',Auth::user()->username);
    }
    public function show(User $user, Post $post){
        
        return view('posts.show',['post'=>$post,'user'=>$user]);
    }

    public function destroy(Post $post){
        // Verificar que el usuario autenticado sea el dueño del post
        if($post->user_id == Auth::user()->id) {
        
       /*  // Eliminar todos los comentarios relacionados con el post
        $post->comentarios()->delete(); */
        
        // Eliminar el post
        $post->delete();

        $img_path=public_path('uploads/'.$post->imagen);
        if(File::exists($img_path)){
            /* unlink($img_path); */ //Con función PHP
            File::delete($img_path); //Con facade de Laravel
        }
        
        return redirect()->route('posts.index', Auth::user()->username)->with('mensaje', 'Post eliminado correctamente');
        }
        else {
            return back()->with('mensaje','No se ha podido eliminar el post');
        }
    }
}
