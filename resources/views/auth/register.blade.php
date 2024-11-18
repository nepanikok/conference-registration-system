@extends('layouts.app')

@section('title', 'Prisijungimas')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Registracija</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="name">Vardas:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="last_name">Pavardė:</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">El. paštas:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Slaptažodis:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Patvirtinti slaptažodį:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Registruotis</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
