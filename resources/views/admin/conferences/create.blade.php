@extends('layouts.app')

@section('title', 'Naujos Konferencijos Kūrimas')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Naujos konferencijos kūrimas</h2>
    <form action="{{ route('conferences.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Įveskite konferencijos pavadinimą" required>
        </div>
    
        <div class="form-group">
            <label for="description">Aprašymas</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Įveskite konferencijos aprašymą" required></textarea>
        </div>
    
        <div class="form-group">
            <label for="speakers">Lektoriai</label>
            <input type="text" class="form-control" id="speakers" name="speakers" placeholder="Įveskite lektorių vardus" required>
        </div>
    
        <div class="form-group">
            <label for="datePicker">Data ir Laikas</label>
            <input type="text" id="datePicker" class="form-control" name="date" placeholder="Pasirinkite datą ir laiką" required>
        </div>
    
        <div class="form-group">
            <label for="address">Adresas</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Įveskite konferencijos adresą" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Sukurti konferenciją</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
   
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#datePicker", {
            enableTime: true, 
            dateFormat: "Y-m-d H:i", 
            time_24hr: true, 
            minuteIncrement: 1, 
            allowInput: true, 
        });
    });
</script>
@endsection
