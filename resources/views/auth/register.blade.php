@extends('layout.app')

@section('titulo')
    Registrate en devstagram
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

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">UserName</label>
                    <input id="username" name="username" type="text" placeholder="Tu Usuario"
                        class="border p-3 w-full rounded-lg
                        @error('username') border-red-600 @enderror"
                        value="{{ old('username') }}"
                   />
                   @error('username')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

<<<<<<< HEAD
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
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"/>
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
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"/>
            </div>
            @error('pass_confirmation')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
            <input
                type="submit"
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
        </form>
    </div>
=======
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">Clave</label>
                    <input id="password" name="password" type="password" placeholder="Tu Clave"
                        class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror" />
                    @error('password')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">Rpepite tu Clave</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Tu Clave"
                        class="border p-3 w-full rounded-lg "

                    />


                </div>

                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-800 hover:bg-amber-700 trasitions-colora
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
>>>>>>> 7a142de7f1d61a400de5f963e7fd46f4decffc10
    </div>
@endsection
