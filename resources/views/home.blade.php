@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <h1 class="mb-2">Noticias</h1>
    @include('posts.partials.list')
@endsection
