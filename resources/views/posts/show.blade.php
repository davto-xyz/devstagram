@extends('layout.app')
@section('titulo')

    {{ $post->titulo }}
@endsection
@section('contenido')

<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads'). '/'. $post->imagen }}" alt="Imagen del post{{ $post->titulo }}">
        <div class='p-4 gap-4 flex'>
            @auth               
                @livewire('like-post',['post'=>$post])
            @endauth
        </div>
        <div class='p-3'>
            <p class='font-bold'>{{$post->user->username}}</p>
            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            <p class="mt-5">{{$post->descripcion}}</p>
        </div>
        @auth
            @if ($post->user_id==auth()->user()->id)
                {{-- @dd("Es la misma persona")
            @else
                @dd("No es la misma persona")
            @endif --}}
                
           
        <div class="p-5">
            <form action="{{route('posts.destroy',$post)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar publicación" class='bg-red-500 hover:bg-red-600 cursor-pointer rounded-lg px-5 py-4 text-white font-bold'>
            </form>
        </div>
         @endif
        @endauth
        
    </div>
    <div class="md:w-1/2 p-5">
        <div class='shadow bg-white p-5 mb-5'>
            @auth
            <p class="text-xl font-bold text-center mb-4">
                Agrega un nuevo comentario
            </p>
                @if (session('mensaje'))
                    <p class="bg-green-500 p-2 rounded-lg mb-6 text-white font-bold text-center">{{session('mensaje')}}</p>
                @endif
            
            <form action=" {{ route('comentario.store',['user'=>$user,'post'=>$post]) }}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-600 font-bold">Añade un comentario</label>
                    <textarea id="comentario" name="comentario" 
                        class="border p-3 w-full rounded-lg  @error('name') border-red-600 @enderror"
                       
                    ></textarea>
                    @error('comentario')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                    </textarea>
                </div>
                <input type="submit" value="Crear comentario"
                    class="bg-sky-800 hover:bg-amber-700 trasitions-colora
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
            @endauth
            @guest
            <a href="{{ route('login') }}">
                <div class='bg-sky-500 hover:bg-sky-700 text-white text-center font-bold p-4 rounded-lg text-2xl'>
                    Inicia sesión para comentar    
                </div>
            </a>
            @endguest
            <div>
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario )
                        <div class='p-5 border-grey-300 border-b'>
                            <div class='font-bold'>
                               <a href=" /{{$comentario->user->username}}"> {{$comentario->user->username}}</a>
                            </div>
                            <div>
                                {{$comentario->comentario}}
                            </div>
                            <div class='text-gray-500 text-xs'>
                                {{ $comentario->created_at->diffForHumans() }}
                            </div>
                            
                        </div>
                    @endforeach
                @else
                    <div class='p-10 text-center'>No hay comentarios</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection