@extends('layouts.app')

@section('title', 'Darbuotojo Posistemis - Konferencijos Peržiūra')

@section('content')
    <div class="container mt-5">
        <h1>{{ $conference->title }}</h1>
        <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($conference->date)->format('Y-m-d H:i') }}</p>
        <p><strong>Vieta:</strong> {{ $conference->address }}</p>
        <p><strong>Aprašymas:</strong> {{ $conference->description }}</p>

        <h2 class="mt-4">Užsiregistravę Klientai</h2>
        @if ($conference->users->isEmpty())
            <p>Nėra užsiregistravusių klientų.</p>
        @else
            <ul class="list-group">
                @foreach ($conference->users as $user)
                    <li class="list-group-item">{{ $user->name }} ({{ $user->email }})</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

