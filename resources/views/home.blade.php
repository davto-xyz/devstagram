@extends('layout.app')

@section('titulo')
Página principal
@endsection

@section('contenido')

    
    <x-post-grid :posts="$posts"/>

@endsection