<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    @stack('head')
</head>
<body class="bg-grey-lighter">
    <header class="text-center">
        <h1 class="text-indigo py-4 font-normal">Curso Laravel</h1>
        @include('partials.navigation')
    </header>
    <main class="bg-white">
        <div class="container mx-auto py-2">
            @yield('content')
        </div>
    </main>
    <footer class="p-8 bg-black">
        <p class="text-xs text-grey-lighter text-center">
            Todos los derechos reservados 2018
        </p>
    </footer>
    @stack('scripts')
</body>
</html>