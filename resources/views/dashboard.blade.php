@extends('layout.app')

@section('titulo')
    Tu cuenta
@endsection
@section('contenido')
    <div class='flex justify-center'>
        <div class='w-full md:w-8/12 lg:w-8/12 md:flex'>
            <div class='md:w-8/12 lg:w-1/2 px-5'>
                Esto es una prueba
            </div>
            <div class='md:w-8/12 lg:w-1/2 px-5'>
                <p>{{ auth()->user()->username }}</p>
            </div>

        </div>

    </div>
@endsection
