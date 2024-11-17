@extends('layouts.app')

@section('title', 'Konferencijų Sąrašas')

@section('content')
    <h1>Konferencijų Sąrašas</h1>
    <ul class="list-group">
        @foreach ($conferences as $conference)
            <li class="list-group-item">
                <h5>{{ $conference->title }}</h5>
                <p>Data: {{ \Carbon\Carbon::parse($conference->date)->format('Y-m-d') }}</p>
                <a href="{{ route('admin.conferences.edit', ['id' => $conference->id]) }}" class="btn btn-warning">Redaguoti</a>
                <form action="{{ route('admin.conferences.delete', ['id' => $conference->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ištrinti</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary">Sukurti Naują Konferenciją</a>
@endsection
