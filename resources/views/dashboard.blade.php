@extends("layouts.app")

@section("titulo")
    Perfil: {{$user->username}}
@endsection

@section("contenido")
    <div class="flex justify-center">
        <div class="w-full flex flex-col items-center md:w-8/12 md:flex-row lg:w-6/12 ">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/userdefault.png')}}" alt="{{$user->username}}"/>
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col justify-items-center md:justify-center md:justify-items-start py-10">
                <p class="text-gray-700 mb-3 text-2xl">{{$user->username}}</p>
                <p class="text-gray-800 text-sm mb-2 font-bold">0 <span class="font-normal">Seguidores</span></p>
                <p class="text-gray-800 text-sm mb-2 font-bold">0 <span class="font-normal">Siguiendo</span></p>
                <p class="text-gray-800 text-sm mb-2 font-bold">0 <span class="font-normal">Publicaciones</span></p>
            </div>
        </div>
    </div>

    @foreach($posts as $post)
        <p>{{$post->titulo}}</p>
    @endforeach
@endsection