@extends('layouts.app')

@section('title', 'Crear Noticia')

@section('content')
    <div class="container">
        <h1>Editar noticia</h1>

        <form action="{{ route('posts.update', $noticia) }}" method="post">
            @csrf
            @method('PATCH')
            <label class="block mt-4">Title</label>
            <input class="border-grey border rounded px-4 py-2 mb-1 {{ $errors->has('title') ? 'border-red' : '' }}"
                   type="text" name="title" value="{{ $noticia->title ? $noticia->title : old('title') }}">
            @if($errors->has('title'))
                <p class="text-red text-sm">{{ $errors->first('title') }} </p>
            @endif

            <label class="block mt-4">Body</label>
            <textarea class="border-grey border rounded px-4 py-2 {{ $errors->has('body') ? 'border-red' : '' }}"
                      name="body">{{ $noticia->body }}</textarea>
            @if($errors->has('body'))
                <p class="text-red text-sm">{{ $errors->first('body') }} </p>
            @endif

            <label class="block mt-4">Fecha</label>
            <input class="border-grey border rounded px-4 py-2  {{ $errors->has('publish_at') ? 'border-red' : '' }}"
                   type="date"
                   name="publish_at"
                   value="{{ $noticia->publish_at->toDateString() }}">
            @if($errors->has('publish_at'))
                <p class="text-red text-sm">{{ $errors->first('publish_at') }} </p>
            @endif

            <div class="mt-4">
                <button type="submit" class="bg-blue text-white px-4 py-2 rounded">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

