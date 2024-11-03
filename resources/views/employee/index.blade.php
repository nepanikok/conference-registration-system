@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Visos konferencijos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Data</th>
                <th>Registruoti klientai</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conferences as $conference)
                <tr>
                    <td>{{ $conference->title }}</td>
                    <td>{{ $conference->date }}</td>
                    <td><a href="{{ route('employee.registrations', $conference->id) }}" class="btn btn-secondary">Peržiūrėti</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection