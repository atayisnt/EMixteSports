@extends('front.layouts.app')

@section('title', 'Accueil')

@section('content')
<!-- Slider Section -->
<div id="mainCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @if($latestProducts->isEmpty())
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
        @else
            @foreach($latestProducts as $index => $product)
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $index }}" @if($loop->first) class="active" @endif></button>
            @endforeach
        @endif
    </div>

    <div class="carousel-inner">
        @if($latestProducts->isEmpty())
            <div class="carousel-item active">
                <img src="{{ asset('slider/slider.png') }}" class="d-block w-100" alt="Default Slider">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Bienvenue sur EMixteSports</h2>
                    <p>Votre destination pour l'équipement sportif de qualité</p>
                </div>
            </div>
        @else
            @foreach($latestProducts as $index => $product)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{ asset('images/produits/' . $product->img_produit) }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="{{ $product->nom }}">
                    <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px;">
                        <h2>{{ $product->nom }}</h2>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                        <h3 class="text-warning">{{ number_format($product->prix, 2) }} €</h3>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Categories Section -->
<section class="mb-5">
    <h2 class="mb-4">Nos Catégories</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($categories as $category)
            <div class="col">
                <div class="card h-100">
                    @if($category->img_categorie)
                        <img src="{{ asset('images/categories/' . $category->img_categorie) }}" 
                             class="card-img-top" 
                             alt="{{ $category->nom }}"
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->nom }}</h5>
                        <p class="card-text">
                            {{ $category->produits_count ?? 0 }} produits disponibles
                        </p>
                        <a href="{{ route('products.category', $category) }}" class="btn btn-outline-primary">
                            Voir les produits
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Latest Products Section -->
<section>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Derniers Produits</h2>
        <a href="{{ route('products.latest') }}" class="btn btn-outline-primary">Voir tout</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($latestProducts as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/produits/' . $product->img_produit) }}" 
                         class="card-img-top" 
                         alt="{{ $product->nom }}"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nom }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0">{{ number_format($product->prix, 2) }} €</span>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary">
                                <i class="bi bi-eye"></i> Voir détails
                            </a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            Catégorie: 
                            <a href="{{ route('products.category', $product->categorie) }}" class="text-decoration-none">
                                {{ $product->categorie->nom }}
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection 