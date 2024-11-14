<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Konferencijos</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Pagrindinis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.index') }}">Klientas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.index') }}">Darbuotojas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Administratoriaus</a>
                </li>
            </ul>
        </div>
        @auth
        <span class="navbar-text">| Sveiki, {{ Auth::user()->name }}</span>
       
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0;">Logout</button>
        </form>
            @else
            <a class="nav-link" href="{{ route('register.form') }}">Login</a>
            <a class="nav-link" href="{{ route('login') }}">register</a>
        @endauth
    </nav>



    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        
        flatpickr("#datePicker", {
            dateFormat: "Y-m-d H:i",
            enableTime: true,
            time_24hr: true,
        });
    </script>
</body>
</html>
