@extends('layouts.app')

@section('title', 'Konferencijos Peržiūra')

@section('content')
    <div class="container mt-5">
        <h1>{{ $conference->title }}</h1>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($conference->date)->format('Y-m-d') }}</p>
                <p><strong>Laikas:</strong> {{ \Carbon\Carbon::parse($conference->date)->format('H:i') }}</p>
                <p><strong>Vieta:</strong> {{ $conference->address }}</p>
            </div>
            <div class="col-md-6">
                <h4>Aprašymas:</h4>
                <p>{{ $conference->description }}</p>
            </div>
        </div>

        <div class="mt-4">
            @auth
                @if($isRegistered)
                    <button class="btn btn-success" disabled>Jūs jau užsiregistravote</button>
                @else
                    <form action="{{ route('conferences.register', $conference->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Registracija</button>
                    </form>
                @endif
            @else
                <button class="btn btn-secondary" disabled>Prisijunkite, kad galėtumėte registruotis</button>
            @endauth
        </div>
    </div>
@endsection

