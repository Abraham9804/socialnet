<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("titulo")</title>
    @stack('styles')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <header class="p-5 bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">SocialNet</h1>
            <nav class="flex gap-2 items-center">
                @auth
                    <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                          </svg>
                           Crear
                    </a>
                    <p class="font-bold text-gray-600">Hola <span class="font-normal">{{Auth::user()->username}}</span></p>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="cursor-pointer font-bold uppercase text-gray-600">Cerrar sesion</button>
                    </form>
                @endauth
                @guest
                    <a href="{{route("login")}}" class="font-bold uppercase text-gray-600">Login</a>
                    <a href="{{route("register")}}" class="font-bold uppercase text-gray-600">Crear Cuenta</a>
                @endguest
                
            </nav>
        </div>
    </header>

    <main class="container mx-auto mx-2 mt-10">
        <h2 class="font-black text-center mb-10 text-xl md:text-2xl ">@yield("titulo")</h2>
        @yield("contenido")
    </main>

    <footer class="text-center mt-10 p-5 text-gray-500 font-bold uppercase">
        SocialNet {{now()->year}}
    </footer>
    @stack('scripts')
</body>
</html>