<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <title>DevStagram</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased ">
        <header class="p-5 border-t-2 border-b shadow bg-white">
            <div class="container mx-auto flex justify-between items-center ">
                <h1 class="font-black text-3xl">DevStagram</h1>

                <nav class=' text-gray-600 text-sm bg-white flex gap-2'>
                    <a class='font-bold uppercase' href='/'>Login </a>
                    <a class='font-bold uppercase' href='{{ route('register')}}'>Crear cuenta </a>
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
    </body>
</html>
