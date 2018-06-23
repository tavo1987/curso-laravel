@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('content')
    <h2 class="text-lg mb-4">Listado de Usuarios</h2>
    <table class="border-collapse">
        <thead>
            <tr>
                <th class="p-2 bg-indigo text-white">ID</th>
                <th class="p-2 bg-indigo text-white">Nombre</th>
                <th class="p-2 bg-indigo text-white">Correo</th>
                <th class="p-2 bg-indigo text-white">Avatar</th>
                <th class="p-2 bg-indigo text-white">Dirección</th>
                <th class="p-2 bg-indigo text-white">Teléfono</th>
                <th class="p-2 bg-indigo text-white">Biografía</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class=" p-2 border-b border-grey-light text-sm">{{ $user->id }}</td>
                    <td class=" p-2 border-b border-grey-light text-sm">{{ $user->name }}</td>
                    <td class=" p-2 border-b border-grey-light text-sm">{{ $user->email }}</td>
                    <td class=" p-2 border-b border-grey-light text-sm">
                        <img style="height: 100px" class="rounded-full" src="{{ $user->profile->avatar }}" alt="{{ $user->name }}">
                    </td>
                    <td class=" p-2 border-b border-grey-light text-sm">{{ $user->profile->address }}</td>
                    <td class=" p-2 border-b border-grey-light text-sm">{{ $user->profile->phone }}</td>
                    <td class=" p-2 border-b border-grey-light text-sm">{{ $user->profile->biography }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $users->links('partials.pagination') }}
    </div>
@endsection
