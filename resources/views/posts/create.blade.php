@extends('layout.app')

@section('titulo')
    Crea una nueva publicación
@endsection



@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center ">
        <div class="md:w-5/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="imagen de registro" >

        </div>
        <div class="md:w-4/12 bg-white rounded-lg p-6 shadow-2xl">
            <form action="{{ route('register') }}" method="POST" novalidate >
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg  @error('name') border-red-600 @enderror"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

               

                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-800 hover:bg-amber-700 trasitions-colora
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection