@extends('layout.app')

@section('titulo')
    Tu cuenta
@endsection
@section('contenido')
    <div class='flex justify-center'>
        <div class='w-full md:w-8/12 lg:w-8/12 md:flex'>
            <div class='md:w-8/12 lg:w-1/2 px-5'>
                <img src="{{ asset('img/usuario.svg') }}"
                hola
            </div>
            <div class='md:w-8/12 lg:w-1/2 px-5'>
                {{-- <p class='text-gray-500 text-2xl'>{{ auth()->user()->username }}</p> --}}
            </div>

        </div>

    </div>
@endsection
