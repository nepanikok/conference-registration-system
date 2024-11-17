@extends('layouts.app')

@section('title', 'Darbuotojo Posistemis - Konferencijų Sąrašas')

@section('content')
    <div class="container mt-5">
        <h1>Visų Įvykusių/Planuojamų Konferencijų Sąrašas</h1>
        
        @if ($conferences->isEmpty())
            <p>Nėra konferencijų, kurias būtų galima rodyti.</p>
        @else
            <ul class="list-group">
                @foreach ($conferences as $conference)
                    <li class="list-group-item mb-3">
                        <h5>{{ $conference->title }}</h5>
                        <p>{{ Str::limit($conference->description, 100) }}</p>
                        <a href="{{ route('employee.conferences.show', ['id' => $conference->id]) }}" class="btn btn-secondary">Peržiūra</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
