@extends('layout.app')

@section('titulo')
    
@endsection
@section('contenido')
    <div class='flex justify-center'>
        <div class='w-full md:w-8/12 lg:w-8/12 flex flex-col items-center md:flex-row'>
            <div class='w-8/12 lg:w-1/2 px-5'>
                <img src="{{ $user->imagen ? asset('/profile-img/').'/'.$user->imagen : asset('img/usuario.svg') }} " class='rounded-full'>
            </div>
            <div class='md:w-8/12 lg:w-1/2 px-5 flex flex-col items-center md:justify-center py-10 md:items-start'>
                <div class='flex items-center gap-2'>

                    <p class='text-gray-500 text-2xl'>{{ $user->username }}</p>
                   

                    @auth
                        @if ($user->id===Auth::user()->id)
                        <a href="{{ route('perfil.index') }}" class='text-gray-500 hover:text-gray-600 cursor-pointer'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>

                        </a>
                        
                        @endif
                    @endauth
                </div>
                @auth
                    @if (Auth::user()->id!=$user->id)
                        <div>
                           
                            @if(!$user->isFollowing(Auth::user()))
                                <form action="{{  route('users.follow',$user) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Seguir" class='bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer'>
                                </form>
                            @else     
                                <form action="{{ route('users.unfollow',$user) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Dejar de seguir" class='bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer'>
                                </form>
                            @endif
                        </div>
                    @endif
                @endauth
                <p class="text-grey-800 text-sm mb-3 mt-2 font-bold">
                    {{ $user->followers->count() }}
                    <span class="font-normal">@choice('Seguidor|Seguidores',$user->followers->count())</span>
                </p>
                <p class="text-grey-800 text-sm mb-3 font-bold">
                    {{ $user->followings->count() }}
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-grey-800 text-sm mb-3 font-bold">
                {{ $posts->count() }}
                    <span class="font-normal">@choice('Post|Posts',$posts->count())</span>
                </p>
            </div>
        </div>
  
    </div>
    <section class='container mx-auto mt-10'>
        <h2 class="font-black text-4xl text-center my-10">Publicaciones</h2>
        @if ($posts->count())
        <div class="container grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6 ">
            @foreach ($posts as $post)
                
                <a href="{{ route('posts.show', ['user'=> $user->username, 'post'=>$post] ) }}">                    
                    <div class='bg-cover bg-center' style="background-image:url(' {{asset('uploads') . '/'. $post->imagen }} ')">
                        <div class='h-96 w-96'></div>
                    </div>
                </a>
                @endforeach
            </div>
            {{ $posts->links('pagination::tailwind') }}
        @else  
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay ninguna publicación </p>
        @endif
    </section>
 
@endsection
