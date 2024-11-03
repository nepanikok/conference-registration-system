@extends('layouts.app')

@section('title', 'Darbuotojo Posistemis - Konferencijų Sąrašas')

@section('content')
    <h1>Visų Įvykusių/Planuojamų Konferencijų Sąrašas</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <h5>Konferencijos Pavadinimas 1</h5>
            <p>Trumpas konferencijos aprašymas.</p>
            <a href="{{ route('employee.conferences.show', ['id' => 1]) }}" class="btn btn-secondary">Peržiūra</a>
        </li>
        
    </ul>
@endsection