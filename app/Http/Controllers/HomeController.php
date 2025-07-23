<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function __invoke()
    {
        // Obtener a quienes seguimos

        $ids=Auth::user()->followings->pluck('id')->toarray();

        $posts= Post::whereIn('user_id',$ids)->latest()->get();

        

        return view('home',['posts'=>$posts]);
    }
}
