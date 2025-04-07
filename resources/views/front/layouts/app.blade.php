<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EMixteSports - Votre équipement sportif de qualité')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #10b981;
            --accent-color: #f43f5e;
            --light-bg: #f9fafb;
            --dark-bg: #1e293b;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --white: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-primary);
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--white);
            padding: 1rem 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color) !important;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: var(--text-primary) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 0 0.2rem;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: rgba(99, 102, 241, 0.1);
        }

        .nav-link.active {
            color: var(--primary-color) !important;
            background-color: rgba(99, 102, 241, 0.1);
        }

        /* Search Bar */
        .search-form {
            width: 100%;
            max-width: 500px;
        }

        .search-input {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            border: 2px solid #e2e8f0;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .search-button {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            border: none;
            color: white;
            transition: all 0.2s ease;
        }

        .search-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* Product Cards */
        .product-card {
            border: none;
            border-radius: 16px;
            transition: all 0.3s ease;
            background: var(--white);
            box-shadow: 0 2px 15px rgba(0,0,0,0.03);
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .product-card img {
            border-radius: 16px 16px 0 0;
            object-fit: cover;
            height: 220px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .product-price {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.25rem;
        }

        .product-category {
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        /* Stock Badge */
        .stock-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            z-index: 1;
        }

        .stock-badge.in-stock {
            background-color: var(--secondary-color);
            color: white;
        }

        .stock-badge.low-stock {
            background-color: #eab308;
            color: white;
        }

        .stock-badge.out-of-stock {
            background-color: var(--accent-color);
            color: white;
        }

        /* Footer */
        .footer {
            background-color: var(--dark-bg);
            color: var(--white);
            padding: 4rem 0 2rem;
            margin-top: 6rem;
        }

        .footer h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.2s ease;
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 400;
        }

        .footer-link:hover {
            color: var(--white);
            transform: translateX(5px);
        }

        /* Alert Messages */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Carousel Customization */
        .carousel-caption {
            background: rgba(30, 41, 59, 0.8);
            border-radius: 16px;
            padding: 2rem;
            backdrop-filter: blur(8px);
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 0 6px;
        }

        /* Category Section */
        .category-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(99, 102, 241, 0.1);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-running me-2"></i>EMixteSports
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.all') }}">
                            <i class="fas fa-box me-1"></i>Produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.latest') ? 'active' : '' }}" href="{{ route('products.latest') }}">
                            <i class="fas fa-star me-1"></i>Nouveautés
                        </a>
                    </li>
                </ul>
                
                <form class="search-form d-flex mx-auto" action="{{ route('products.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="q" class="form-control search-input" 
                               placeholder="Rechercher un produit..." 
                               value="{{ request('q') }}">
                        <button class="btn search-button" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->is_admin)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            <i class="fas fa-tachometer-alt me-1"></i>Administration
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Connexion
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>EMixteSports</h5>
                    <p>Votre destination pour l'équipement sportif de qualité</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Liens rapides</h5>
                    <a href="{{ route('home') }}" class="footer-link">Accueil</a>
                    <a href="{{ route('products.all') }}" class="footer-link">Tous les produits</a>
                    <a href="{{ route('products.latest') }}" class="footer-link">Nouveautés</a>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>contact@emixte.com</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i>+33 1 23 45 67 89</p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Paris, France</p>
                </div>
            </div>
            <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} EMixteSports. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 