@extends('layout.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('script')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush

@section('contenido')


    <div class="md:flex md:justify-center md:gap-8 md:items-center ">
        <div class="md:w-5/12 p-5">
            <form action="{{ route('img.store') }}" method="POST" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" id='dropzone'>
            
            </form>

        </div>
        <div class="md:w-4/12 bg-white rounded-lg p-6 shadow-2xl">
            <form action="{{ route('register') }}" method="POST" novalidate >
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-600 font-bold">Título</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Título de la publicación"
                        class="border p-3 w-full rounded-lg  @error('name') border-red-600 @enderror"
                        value="{{ old('titulo') }}"
                    />
                    @error('titulo')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-600 font-bold">Descripción</label>
                    <textarea id="descripcion" name="descripcion" type="text"
                        class="border p-3 w-full rounded-lg  @error('name') border-red-600 @enderror"
                       
                    />
                    @error('descripcion')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                    </textarea>
                </div>

               

                <input type="submit" value="Crear publicación"
                    class="bg-sky-800 hover:bg-amber-700 trasitions-colora
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection