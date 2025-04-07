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
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
            --dark-bg: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--light-bg);
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--dark-bg);
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: white !important;
        }

        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-1px);
        }

        .nav-link.active {
            color: white !important;
            border-bottom: 2px solid var(--secondary-color);
        }

        /* Search Bar */
        .search-form {
            width: 100%;
            max-width: 500px;
        }

        .search-input {
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .search-button {
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            background-color: var(--secondary-color);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background-color: #2980b9;
            transform: translateY(-1px);
        }

        /* Product Cards */
        .product-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .product-card img {
            border-radius: 15px 15px 0 0;
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .product-price {
            color: var(--accent-color);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .product-category {
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            background-color: var(--dark-bg);
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }

        .footer h5 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 0.5rem;
        }

        .footer-link:hover {
            color: white;
            transform: translateX(5px);
        }

        /* Breadcrumb */
        .custom-breadcrumb {
            background-color: transparent;
            padding: 1rem 0;
        }

        .breadcrumb-item a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-1px);
        }

        /* Category Pills */
        .category-pill {
            background-color: var(--light-bg);
            color: var(--primary-color);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            margin: 0.25rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .category-pill:hover {
            background-color: var(--secondary-color);
            color: white;
            transform: translateY(-1px);
        }

        /* Stock Badge */
        .stock-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 0.25rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .stock-badge.in-stock {
            background-color: #2ecc71;
            color: white;
        }

        .stock-badge.low-stock {
            background-color: #f1c40f;
            color: white;
        }

        .stock-badge.out-of-stock {
            background-color: var(--accent-color);
            color: white;
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