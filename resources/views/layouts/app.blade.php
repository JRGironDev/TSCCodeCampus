<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>TDSCodeCampus - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireScripts
    </head>
    <body class="bg-lime-200">
        <header class="p-5 border-b bg-white shodow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}"  class="font-bold text-3xl text-eerieblack">
                    TDSCodeCampus
                </a>

                @auth
                    <nav class="flex gap-3 items-center">
                        <a class="flex items-center gap-2 bg-white border border-huntergreen p-2 text-huntergreen rounded font-bold cursor-pointer hover:bg-huntergreen hover:text-white" 
                            href="{{ route('posts.create')}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                          </svg>
                          Crear</a>
                        <a class="text-eerieblack hover:border-b-2 border-bloodred text-lg" 
                            href="{{route('posts.index', auth()->user()->username)}}"><span class="text-huntergreen font-bold">{{auth()->user()->username}}</span></a>
                        <form class="flex flex-col items-center  my-0" method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="text-huntergreen border-bloodred hover:border-b-2" href="{{ route('logout')}}">Cerrar Sesión </button>                           
                        </form>
                    </nav>
                @endauth

                @guest  
                    <nav class="flex gap-2 items-center">
                        <a class="text-huntergreen hover:border-b-2 border-bloodred text-lg" href="{{route('login')}}">Login</a>
                        <a class="text-huntergreen hover:border-b-2 border-bloodred text-lg" href="{{ route('register')}}">Crear Cuenta</a>
                    </nav>
                @endguest

            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="text-eerieblack font-bold text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 text-eerieblack font-bold mt-10">
            TDSCodeCampus - Todos los derechos reservados {{ now() -> year}}
        </footer>
        
    </body>
</html>