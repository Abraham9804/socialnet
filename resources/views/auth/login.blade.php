@extends("layouts.app")

@section("titulo")
    Inicia sesión en SocialNet
@endsection

@section("contenido")
    <div class="flex justify-center md:gap-10 md:items-center">
        <div class="hidden lg:w-6/12 lg:block p-5">
            <img src="{{asset('img/register.png')}}" alt="imagen registro de usuario"/>
        </div>
        <div class="w-8/12 md:w-6/12 lg:w-4/12 p-6 bg-white rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}" novalidate>
                @session('mensaje')
                <p class="text-red-500 text-center mb-3">
                    {{$value}}
                </p>    
                @endsession
                @csrf
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo electronico</label>
                    <input id="email" name="email" type="email" placeholder="Tu correo electronico" value="{{old("email")}}"
                    class="border border-gray-200 p-3 w-full rounded-lg @error("email") border-red-500 @enderror">
                    @error("email")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Contraseña" class="border border-gray-200 p-3 w-full rounded-lg @error("password") border-red-500 @enderror">
                    @error("password")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" class="mr-1 cursor-pointer" name="remember" id="remember">
                    <label for="remember" class="text-gray-500 text-sm cursor-pointer">Mantener mi sesion abierta</label>
                </div>
                <input type="submit" value="Iniciar sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection