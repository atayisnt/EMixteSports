@extends('front.layouts.app')

@section('title', 'Accueil - EMixteSports')

@section('content')
<!-- Hero Carousel -->
<div id="mainCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @if($latestProducts->isEmpty())
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
        @else
            @foreach($latestProducts as $key => $product)
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></button>
            @endforeach
        @endif
    </div>

    <div class="carousel-inner">
        @if($latestProducts->isEmpty())
            <div class="carousel-item active">
                <img src="{{ asset('slider/slider.png') }}" class="d-block w-100" alt="EMixteSports" style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Bienvenue sur EMixteSports</h2>
                    <p>Votre destination pour l'équipement sportif de qualité</p>
                </div>
            </div>
        @else
            @foreach($latestProducts as $key => $product)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('images/produits/' . $product->img_produit) }}" class="d-block w-100" alt="{{ $product->nom }}" style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.5); border-radius: 15px; padding: 20px;">
                        <h2>{{ $product->nom }}</h2>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                        <p class="h4 text-warning mb-3">{{ number_format($product->prix, 2) }} €</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                            Voir le produit <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>

<!-- Categories Section -->
<section class="container mb-5">
    <h2 class="text-center mb-4">Nos Catégories</h2>
    <div class="row g-4">
        @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('products.category', $category->id) }}" class="text-decoration-none">
                    <div class="card h-100 product-card">
                        <img src="{{ asset('images/categories/' . $category->img_Categorie) }}" 
                             class="card-img-top" 
                             alt="{{ $category->nom }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">{{ $category->nom }}</h5>
                            <p class="text-muted mb-0">{{ $category->produits_count }} produits</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

<!-- Latest Products Section -->
<section class="container mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Derniers Produits</h2>
        <a href="{{ route('products.latest') }}" class="btn btn-primary">
            Voir tout <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
    <div class="row g-4">
        @foreach($latestProducts as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 product-card">
                    @if($product->quantite_stock > 10)
                        <span class="stock-badge in-stock">En stock</span>
                    @elseif($product->quantite_stock > 0)
                        <span class="stock-badge low-stock">Stock limité</span>
                    @else
                        <span class="stock-badge out-of-stock">Épuisé</span>
                    @endif
                    
                    <img src="{{ asset('images/produits/' . $product->img_produit) }}" 
                         class="card-img-top" 
                         alt="{{ $product->nom }}">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="product-title">{{ $product->nom }}</h5>
                        <p class="product-category mb-2">
                            <i class="fas fa-tag me-1"></i>{{ $product->categorie->nom }}
                        </p>
                        <p class="text-muted mb-3">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-auto">
                            <p class="product-price mb-3">{{ number_format($product->prix, 2) }} €</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">
                                Voir le produit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection 