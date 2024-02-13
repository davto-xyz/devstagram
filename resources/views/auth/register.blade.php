@extends('layout.app')

@section('titulo')
Regístrate en DevStagram
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-4/12">
            <img src="{{asset('img/registrar.jpg')}}" class="rounded-lg" >
        </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Tu nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500

                    @enderror"
                    value="{{ old('name') }}"/>
            </div>
            @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
            <div>
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Usuario
                </label>
            </div>
            <div class="mb-3">
                <input
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500

                    @enderror"
                    value="{{ old('username') }}"/>
            </div>
            @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
            <div>
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Correo electrónico
                </label>
            </div>
            <div class="mb-3">
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Tu email"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500

                    @enderror"
                    value="{{ old('email') }}"/>
            </div>
            @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
            <div>
                <label for="pass" class="mb-2 block uppercase text-gray-500 font-bold">
                    Contraseña
                </label>
            </div>
            <div class="mb-3">
                <input
                    id="pass"
                    name="pass"
                    type="password"
                    placeholder="Tu contraseña"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500

                    @enderror"
                    value="{{ old('password') }}"/>
            </div>
            @error('pass')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
            <div>
                <label for="pass_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir contraseña
                </label>
            </div>
            <div class="mb-3">
                <input
                    id="pass_confirmation"
                    name="pass_confirmation"
                    type="password"
                    placeholder="Repite tu contraseña"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500

                    @enderror"
                    value="{{ old('pass_confirmation') }}"/>
            </div>
            @error('pass_confirmation')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
            <input
                type="submit"
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
    </div>
@endsection


