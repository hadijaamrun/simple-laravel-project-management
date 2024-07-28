<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Project Management</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('projects.index') }}">Projects</a></li>
                    <li><a href="{{ route('notifications.index') }}">Notifications</a></li>
                    <!-- Add more navigation links as needed -->
                </ul>
            </nav>
        </header>
        
        <main>
            @yield('content')
        </main>
        
        <footer>
            <p>&copy; {{ date('Y') }} Tugas Personal Web Progamming</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
</body>
</html>
