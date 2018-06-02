@extends('layouts.layout')

@section('title', 'Noticias')

@section('content')
    <h1 class="mb-2">Usuarios</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>
@endsection
