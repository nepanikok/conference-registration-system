@extends('layouts.app')

@section('title', 'Prisjungimas')

@section('content')
    <div class="container mt-5">
        <h2>Prisijungimas</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">El. paštas</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Slaptažodis</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Prisijungti</button>
        </form>
    </div>
    @endsection
