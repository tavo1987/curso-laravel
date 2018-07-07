@extends('layouts.app')

@section('title', 'Crear Noticia')

@section('content')
    <div class="container">
        <h1>Crear noticia</h1>
        @if($errors->any())
            <div role="alert">
                <div class="bg-red text-white font-bold rounded-t px-4 py-2">
                    Errores
                </div>
                <div class="border border-t-0 border-red-light rounded-b bg-red-lightest px-4 py-3 text-red-dark">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <label class="block mt-4">Title</label>
            <input class="border-grey border rounded px-4 py-2 mb-1 {{ $errors->has('title') ? 'border-red' : '' }}"
                   type="text" name="title" value="{{ old('title') }}">
            @if($errors->has('title'))
                <p class="text-red text-sm">{{ $errors->first('title') }} </p>
            @endif

            <label class="block mt-4">Body</label>
            <textarea class="border-grey border rounded px-4 py-2 {{ $errors->has('body') ? 'border-red' : '' }}"
                      name="body">{{ old('body') }}</textarea>
            @if($errors->has('body'))
                <p class="text-red text-sm">{{ $errors->first('body') }} </p>
            @endif

            <label class="block mt-4">Fecha</label>
            <input class="border-grey border rounded px-4 py-2  {{ $errors->has('publish_at') ? 'border-red' : '' }}"
                   type="date"
                   name="publish_at"
                   value="{{ old('publish_at') }}">
            @if($errors->has('publish_at'))
                <p class="text-red text-sm">{{ $errors->first('publish_at') }} </p>
            @endif

            <div class="mt-4">
                <button type="submit" class="bg-blue text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
@endsection

