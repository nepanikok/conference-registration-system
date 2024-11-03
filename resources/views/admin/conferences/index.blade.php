@extends('layouts.app')

@section('title', 'Konferencijų Sąrašas')

@section('content')
    <h1>Konferencijų Sąrašas</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <h5>Konferencijos Pavadinimas 1</h5>
            <p>Data: 2024-12-01</p>
            <a href="{{ route('admin.conferences.edit', ['id' => 1]) }}" class="btn btn-warning">Redaguoti</a>
            <form action="{{ route('admin.conferences.delete', ['id' => 1]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Ištrinti</button>
            </form>
        </li>
       
    </ul>
    <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary">Sukurti Naują Konferenciją</a>
@endsection