<ul class="list-reset flex bg-blue p-4">
    <li class="mr-6">
        <a class="text-white hover:text-white-darker no-underline {{ Route::currentRouteName('home') ? 'text-red' : '' }}" href="{{ route('home') }}">Home</a>
    </li>
    <li class="mr-6">
        <a class="text-white hover:text-white-darker no-underline" href="{{ route('users') }}">Usuarios</a>
    </li>
    <li class="mr-6">
        <a class="text-white hover:text-white-darker no-underline" href="{{ route('posts.create') }}">Crear Noticia</a>
    </li>
    <li class="mr-6">
        <a class="text-white cursor-not-allowed no-underline" href="#">Disabled</a>
    </li>
</ul>