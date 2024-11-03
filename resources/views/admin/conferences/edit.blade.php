@extends('layouts.app')

@section('title', 'Konferencijos Redagavimas')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Redaguoti konferenciją</h2>
    <form action="{{ route('admin.conferences.update', ['id' => $id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Įveskite konferencijos pavadinimą" value="{{ old('title', 'Konferencijos Pavadinimas 1') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Aprašymas</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Įveskite konferencijos aprašymą" required>{{ old('description', 'Konferencijos aprašymas čia.') }}</textarea>
        </div>

        <div class="form-group">
            <label for="speakers">Lektoriai</label>
            <input type="text" class="form-control" id="speakers" name="speakers" placeholder="Įveskite lektorių vardus" value="{{ old('speakers', 'Lektorius 1, Lektorius 2') }}" required>
        </div>

        <div class="form-group">
            <label for="datePicker">Data ir Laikas</label>
            <input type="text" id="datePicker" class="form-control" placeholder="Pasirinkite datą ir laiką" value="{{ old('date_time', '2024-12-01 10:00') }}" required>
        </div>

        <div class="form-group">
            <label for="address">Adresas</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Įveskite konferencijos adresą" value="{{ old('address', 'Adresas čia') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atnaujinti konferenciją</button>
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
        });
    });
</script>
@endsection
