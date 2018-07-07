<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Title', 'Home')</title>
    <link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
</head>
<body>
    <header class="bg-indigo">
        <div class="container mx-auto flex justify-between items-center">
            <span class="text-4xl uppercase font-bold text-white py-6">Blog</span>
            <nav>
                <ul class="list-reset flex">
                    <li><a class="no-underline text-white px-4 hover:text-black" href="{{ route('home') }}">Home</a></li>
                    <li><a class="no-underline text-white px-4 hover:text-black" href="#">Contactos</a></li>
                    <li><a class="no-underline text-white px-4 hover:text-black" href="{{ route('posts.create') }}">Crear Noticia</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container mx-auto py-6">
        @if(session('success'))
            <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md mb-4" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="bg-black text-white h-8 py-8 flex items-center justify-center">
        Curso Laravel 2018
    </footer>
</body>
</html>