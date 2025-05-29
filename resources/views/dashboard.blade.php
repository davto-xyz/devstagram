@extends('layout.app')

@section('titulo')
    
@endsection
@section('contenido')
    <div class='flex justify-center'>
        <div class='w-full md:w-8/12 lg:w-8/12 flex flex-col items-center md:flex-row'>
            <div class='w-8/12 lg:w-1/2 px-5'>
                <img src="{{ asset('img/usuario.svg') }}">
            </div>
            <div class='md:w-8/12 lg:w-1/2 px-5 flex flex-col items-center md:justify-center py-10 md:items-start'>
                <p class='text-gray-500 text-2xl'>{{ auth()->user()->username }}</p>
                <p class="text-grey-800 text-sm mb-3 mt-2 font-bold">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-grey-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-grey-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>

    </div>
@endsection
