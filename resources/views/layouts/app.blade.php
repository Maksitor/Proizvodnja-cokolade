<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chocolate Factory - @yield('title')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome za ikonice -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-brown: #5d4037;
            --secondary-brown: #8d6e63;
            --light-brown: #d7ccc8;
            --accent-gold: #ffb300;
            --dark-chocolate: #3e2723;
            --light-cream: #f9f7f3;
        }
        
        body { 
            background-color: var(--light-cream); 
            font-family: 'Montserrat', sans-serif;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
        }
        
        h1, h2, h3, h4, h5, .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        
        .navbar { 
            background: linear-gradient(135deg, var(--dark-chocolate) 0%, var(--primary-brown) 100%) !important; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            letter-spacing: 0.5px;
        }
        
        .navbar-brand .logo-icon {
            background-color: var(--accent-gold);
            color: var(--dark-chocolate);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 179, 0, 0.15);
            color: var(--accent-gold) !important;
        }
        
        .btn-primary { 
            background: linear-gradient(to right, var(--primary-brown), var(--dark-chocolate));
            border: none;
            padding: 0.7rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(93, 64, 55, 0.3);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-brown);
            color: var(--primary-brown);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-brown);
            color: white;
        }
        
        .card { 
            border-radius: 16px; 
            box-shadow: 0 8px 25px rgba(0,0,0,0.08); 
            border: 1px solid rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--secondary-brown) 100%);
            color: white;
            border-radius: 16px 16px 0 0 !important;
            padding: 1.2rem 1.8rem;
            border-bottom: none;
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #ffca28 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--dark-chocolate);
            font-size: 1.8rem;
            box-shadow: 0 6px 15px rgba(255, 179, 0, 0.3);
        }
        
        .hero-section {
            background: linear-gradient(rgba(62, 39, 35, 0.9), rgba(62, 39, 35, 0.8)), url('https://images.unsplash.com/photo-1575377427642-087cf684f29d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            border-radius: 20px;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            border-left: 5px solid var(--accent-gold);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-brown);
            line-height: 1;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.5rem;
        }
        
        .alert-warning-custom {
            background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
            border: none;
            border-left: 5px solid #ffb300;
            border-radius: 10px;
            color: #5d4037;
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-chocolate) 0%, var(--primary-brown) 100%);
            color: white;
            padding: 2.5rem 0;
            margin-top: 4rem;
        }
        
        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .copyright {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }
        
        .table-custom th {
            background-color: #f8f4f0;
            color: var(--primary-brown);
            font-weight: 600;
            border-top: none;
        }
        
        .badge-status {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .badge-available { background-color: #e8f5e9; color: #2e7d32; }
        .badge-critical { background-color: #ffebee; color: #c62828; }
        .badge-out { background-color: #fff3e0; color: #ef6c00; }
    </style>
</head>
<body>
    <!-- Include Navigation -->
    @include('partials.nav')

    <!-- Main Content -->
    <main class="container my-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>