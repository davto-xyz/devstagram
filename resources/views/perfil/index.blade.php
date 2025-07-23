@extends('layout.app')
@section('titulo')
Editar perfil: {{ Auth::user()->username }}
@endsection
@section('contenido')

    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
        <form method="POST" action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" enctype="multipart/form-data">
            @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">Nombre de usuario</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg  @error('username') border-red-600 @enderror"
                        value="{{ Auth::user()->username }}"
                    />
                    @error('username')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-600 font-bold">Foto de perfil</label>
                    <input id="imagen" name="imagen" type="file" placeholder="Foto de perfil" accept=".jpg,.jpeg,.png"
                        class="border p-3 w-full rounded-lg"/>
                    
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email" value={{ Auth::user()->email }}
                        class="border p-3 w-full rounded-lg"/>                    
                </div>
                
                <div class="mb-5">
                    <label for="old_password" class="mb-2 block uppercase text-gray-600 font-bold">Contraseña actual</label>
                    <input id="old_password" name="old_password" type="password" placeholder="Contraseña actual"
                        class="border p-3 w-full rounded-lg"/>   
                    @error('old_password')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $error }}
                        </p>
                    @enderror                 
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">Nueva contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Nueva contraseña"
                        class="border p-3 w-full rounded-lg"/>                    
                </div>

                <div class="mb-5">
                    <input type="submit" value="Guardar cambios"
                    class="bg-sky-800 hover:bg-amber-700 trasitions-colora
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </div>
        </form>
        </div>
    </div>
@endsection