<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Konferencijų Registracijos Sistema</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Konferencijos</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link disabled">Naudotojas: <?php

                       // namespace App\Models;
                        
                        use Illuminate\Database\Eloquent\Factories\HasFactory;
                        use Illuminate\Database\Eloquent\Model;
                        
                        class Conference extends Model
                        {
                            use HasFactory;
                        
                            protected $fillable = [
                                'name',
                                'description',
                                'date',
                                'time',
                                'location',
                                // Pridėk kitus laukus, jei reikia
                            ];
                        }?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Flatpickr initialization example
        flatpickr("#datePicker", {
            dateFormat: "Y-m-d",
            enableTime: true,
            time_24hr: true,
        });
    </script>
</body>
</html>