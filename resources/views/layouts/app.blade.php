<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("titulo")</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="p-5 bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">SocialNet</h1>
            <nav class="flex gap-2 items-center">
                @auth
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

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield("titulo")</h2>
        @yield("contenido")
    </main>

    <footer class="text-center mt-10 p-5 text-gray-500 font-bold uppercase">
        SocialNet {{now()->year}}
    </footer>
</body>
</html>