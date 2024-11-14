@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Konferencijų registracijos sistema</h1>
    
    <div class="mt-4">
        <h2>Naudotojo informacija:</h2>
        <p><strong>Vardas:</strong> Deividas Kvetkauskas</p>
        <p><strong>Grupė:</strong> [PIT-21-I-NT]</p>
    </div>

    <div class="mt-4">
        <h3>Vaidmenų posistemiai:</h3>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('client.index') }}" class="btn btn-primary">Kliento posistemis</a></li>
            <li class="list-group-item"><a href="{{ route('employee.index') }}" class="btn btn-primary">Darbuotojo posistemis</a></li>
            <li class="list-group-item"><a href="{{ route('admin.index') }}" class="btn btn-warning">Administratoriaus posistemis</a></li>
            <li class="list-group-item"><a href="{{ route('register.form') }}" class="btn btn-warning">registracija</a></li>
        </ul>
    </div>
</div>
@endsection
