@extends('layouts.app')

@section('title', 'Naudotojų Sąrašas')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Sistemos Naudotojų Sąrašas</h1>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    <h5>{{ $user->name }}</h5>
                    <p>El. paštas: {{ $user->email }}</p>
                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Redaguoti</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
