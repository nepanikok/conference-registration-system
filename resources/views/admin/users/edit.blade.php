@extends('layouts.app')

@section('title', 'Redaguoti Naudotoją')

@section('content')
    <h1>Redaguoti Naudotoją</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.users.update', ['id' => $id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Vardas</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Pavardė</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">El. pašto adresas</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Patvirtinti</button>
    </form>
@endsection