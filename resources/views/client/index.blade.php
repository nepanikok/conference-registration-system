@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Planuojamos konferencijos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Data</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conferences as $conference)
                <tr>
                    <td>{{ $conference->title }}</td>
                    <td>{{ $conference->date }}</td>
                    <td>
                        <a href="{{ route('conference.show', $conference->id) }}" class="btn btn-info">Peržiūrėti</a>
                        <form action="{{ route('registration.store', $conference->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Registruotis</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
