@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="mb-2">Noticias</h1>
    <form action="{{ route('posts') }}" method="post">
        @csrf
        <label for="">Title</label>
        <input type="text" name="title" class="border"/>
        <button type="submit">Enviar</button>
    </form>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>
                {{ $post->body }}
            </p>
        </div>
    @endforeach
@endsection
