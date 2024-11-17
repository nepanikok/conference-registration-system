@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@extends('layouts.app')

@section('title', 'Konferencijų Sąrašas')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Konferencijų Sąrašas</h1>
        <div class="row">
            @foreach($conferences as $conference)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $conference->title }}</h5>
                            <p class="card-text text-muted">{{ \Str::limit($conference->description, 100) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('conferences.show', ['id' => $conference->id]) }}" class="btn btn-outline-secondary">Peržiūra</a>

                                @if(auth()->check() && auth()->user()->conferences->contains($conference->id))
                                    <button class="btn btn-success" disabled>Užsiregistravęs</button>
                                @elseif(auth()->check())
                                    <!-- Registracijos forma -->
                                    <form action="{{ route('conferences.register', $conference->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">Registracija</button>
                                    </form>
                                @else
                                    <button class="btn btn-outline-secondary" disabled>Prisijunkite, kad registruotumėtės</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


