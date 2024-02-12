<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-grey-100">
        <header class="p-5 border-t-2 border-b shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="font-black uppercase text-3xl">Devstagram</h1>

                <nav class=' text-gray-600 text-sm bg-white flex gap-2'>
                    <a class='font-bold uppercase' href='#'>Login </a>
                    <a class='font-bold uppercase' href='/crear-cuenta'>Crear cuenta </a>
                </nav>
                
            </di∫v>

        </header>
        
            <main class='container mx-auto mt-10'>
                <h2 class="font-black text-center text-3xl mb-10">
                    @yield('titulo')
                </h2>
            </main>
            <footer class="text-center">
                DevStagram - <?php echo date('Y');?>
            </footer>
    </body>
</html>
