@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="mb-2">Noticias</h1>
    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>
                {{ $post->body }}
            </p>
        </div>
    @endforeach
@endsection
