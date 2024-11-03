@extends('layouts.app')

@section('title', 'Konferencijų Sąrašas')

@section('content')
    <h1 class="mb-4">Konferencijų Sąrašas</h1>
    <div class="row">
        <!-- Konferencijos kortelė -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Konferencijos Pavadinimas 1</h5>
                    <p class="card-text">Trumpas konferencijos aprašymas.</p>
                    <button class="btn btn-primary me-2">Registracija</button>
                    <a href="{{ route('conferences.show', ['id' => 1]) }}" class="btn btn-secondary">Peržiūra</a>
                </div>
            </div>
        </div>
        <!-- Kitos konferencijos kortelės galima kopijuoti -->
    </div>
@endsection