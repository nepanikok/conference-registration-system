@extends('layouts.app')

@section('title', 'Prisjungimas')

@section('content')
    <h1>Registracija</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Vardas:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">El. paštas:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Slaptažodis:</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Patvirtinti slaptažodį:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button type="submit">Registruotis</button>
    </form>

@endsection