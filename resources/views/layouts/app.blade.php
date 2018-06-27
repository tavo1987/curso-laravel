<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
</head>
<body>
    <header class="bg-grey-light">
        <div class="container mx-auto flex justify-between items-center">
            <span class="text-4xl uppercase font-bold text-grey-darker">Blog</span>
            <nav>
                <ul class="list-reset flex">
                    <li><a class="no-underline text-blue px-4 hover:text-blue-dark" href="#">Home</a></li>
                    <li><a class="no-underline text-blue px-4 hover:text-blue-dark" href="#">Contactos</a></li>
                    <li><a class="no-underline text-blue px-4 hover:text-blue-dark" href="#">Categorías</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container mx-auto py-6">
        @yield('content')
    </div>

    <footer class="bg-black text-white h-8 py-8 flex items-center justify-center">
        Curso Laravel 2018
    </footer>
</body>
</html>