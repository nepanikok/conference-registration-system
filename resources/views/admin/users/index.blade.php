@extends('layouts.app')

@section('title', 'Naudotojų Sąrašas')

@section('content')
    <h1>Sistemos Naudotojų Sąrašas</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <h5>Naudotojo Vardas 1</h5>
            <p>El. paštas: user1@example.com</p>
            <a href="{{ route('admin.users.edit', ['id' => 1]) }}" class="btn btn-warning">Redaguoti</a>
        </li>
        <!-- Pridėkite daugiau naudotojų elementų -->
    </ul>
@endsection