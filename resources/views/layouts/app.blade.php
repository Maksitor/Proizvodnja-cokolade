<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chocolate Factory - @yield('title')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f5f5dc; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar { 
            background-color: #5d4037 !important; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .btn-primary { 
            background-color: #5d4037; 
            border-color: #5d4037; 
        }
        .btn-primary:hover {
            background-color: #4e342e;
            border-color: #4e342e;
        }
        .btn-success {
            background-color: #388e3c;
            border-color: #388e3c;
        }
        .card { 
            border-radius: 12px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
            border: none;
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #5d4037;
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem 1.5rem;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .badge-dostupno { background-color: #4caf50; }
        .badge-nedostupno { background-color: #ff9800; }
        .badge-kriticno { background-color: #f44336; }
        .table th { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <span style="font-size: 1.8rem; margin-right: 10px;">🍫</span>
                Chocolate Factory
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('naruci') ? 'active' : '' }}" href="/naruci">Naruči proizvod</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sirovine/stanje') ? 'active' : '' }}" href="/sirovine/stanje">Stanje sirovina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('proizvodni-procesi*') ? 'active' : '' }}" href="/proizvodni-procesi">Proizvodne serije</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('proizvodi*') ? 'active' : '' }}" href="/proizvodi">Admin Panel</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="mt-5 py-4 text-center" style="background-color: #5d4037; color: white;">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Chocolate Factory. Sva prava zadržana.</p>
            <p class="mb-0">Projekat za predmet Uvod u softversko inženjerstvo</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>