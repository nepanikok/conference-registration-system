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
            @role('klientas')
            <li class="list-group-item">
                <a href="{{ route('client.index') }}" class="btn btn-primary">Kliento posistemis</a>
            </li>
            @else
            <li class="list-group-item">
                <button class="btn btn-primary" disabled>Kliento posistemis (nepasiekiama)</button>
            </li>
            @endrole

            @role('darbuotojas')
            <li class="list-group-item">
                <a href="{{ route('employee.index') }}" class="btn btn-primary">Darbuotojo posistemis</a>
            </li>
            @else
            <li class="list-group-item">
                <button class="btn btn-primary" disabled>Darbuotojo posistemis (nepasiekiama)</button>
            </li>
            @endrole

            @role('administratorius')
            <li class="list-group-item">
                <a href="{{ route('admin.index') }}" class="btn btn-warning">Administratoriaus posistemis</a>
            </li>
            @else
            <li class="list-group-item">
                <button class="btn btn-warning" disabled>Administratoriaus posistemis (nepasiekiama)</button>
            </li>
            @endrole
        </ul>
    </div>
</div>
@endsection

