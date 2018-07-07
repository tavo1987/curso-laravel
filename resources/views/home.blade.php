@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="text-indigo text-2xl mb-4 uppercase">últimas Noticias</h1>
    <div class="flex flex-wrap justify-between">
        @foreach ($noticias as $noticia)
            <article class="bg-grey-lighter shadow rounded-lg px-4 py-6 mb-4 w-1/3">
                <h2 class="text-xl mb-4">
                    {{ $noticia->title }}
                    <span class="text-sm text-grey">
                        {{ $noticia->created_at }}
                    </span>
                </h2>
                <p class="mb-4">
                    {{ $noticia->body }}
                </p>
                <span class="bg-indigo text-sm text-white p-1 rounded">
                    Creador por: {{ $noticia->user->name }}
                </span>
                <a class="block mt-4" href="{{ route('posts.edit', $noticia) }}">Editar</a>
            </article>
        @endforeach
    </div>
@endsection
