@extends('layouts.app')

@section('title', 'Sistemos Administratoriaus Posistemis')

@section('content')
    <h1>Sistemos Administratoriaus Posistemis</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Naudotojų Duomenų Valdymas</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.conferences.index') }}" class="btn btn-primary">Konferencijų Valdymas</a>
        </li>
    </ul>
@endsection