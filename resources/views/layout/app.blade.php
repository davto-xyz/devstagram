<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        @stack('script')
        
        <title>DevStagram</title>
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased ">
        <header class="p-5 border-t-2 border-b shadow bg-white">
            <div class="container mx-auto flex justify-between items-center ">
                <h1 class="font-black text-3xl"><a href="{{ route('home.index') }}">DevStagram</a></h1>

                <nav class=' text-gray-600 text-sm bg-white flex gap-2'>
                    @auth
                    <a class='flex items-center gap-2 bg-white border p-2 text-grey-600 rounded text-sm uppercase font-bold cursor-pointer' href="{{ route('posts.create') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
</svg>
Crear post</a>
    <a href="{{ route('posts.index',Auth::user()->username) }}" class="font-bold text-gray-600 text-sm content-center">
                        <p class='font-bold uppercase'>Hola:{{ auth()->user()->name }}</p>
                        </a>
                        <form class='content-center' method="POST" action={{ route('logout') }}>
                            @csrf
                            <button class='font-bold uppercase ' type='submit'>Cerrar sesión</button>
                        </form>
                    @endauth
                    @guest
                        <a class='font-bold uppercase' href='{{ route('login')}}'>Login </a>
                        <a class='font-bold uppercase' href='{{ route('register')}}'>Crear cuenta </a>
                    @endguest
                </nav>

            </div>

        </header>

            <main class='container mx-auto mt-10 bg-grey-300'>
                <h2 class="font-black text-center text-3xl mb-10">
                    @yield('titulo')
                </h2>
                @yield('contenido')
            </main>
            <footer class="text-center font-bold p-9">
                DevStagram - {{now()->year}}
            </footer>
            @livewireScripts
    </body>
</html>
