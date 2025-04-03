@extends('front.layouts.app')

@section('title', $produit->nom)

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item">
            <a href="{{ route('products.category', $produit->categorie) }}">
                {{ $produit->categorie->nom }}
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $produit->nom }}</li>
    </ol>
</nav>

<div class="row">
    <!-- Product Image -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <img src="{{ asset('images/produits/' . $produit->img_produit) }}" 
                 class="card-img-top" 
                 alt="{{ $produit->nom }}"
                 style="max-height: 500px; object-fit: contain;">
        </div>
    </div>

    <!-- Product Details -->
    <div class="col-md-6">
        <h1 class="mb-3">{{ $produit->nom }}</h1>
        
        <div class="mb-4">
            <span class="h2 text-primary">{{ number_format($produit->prix, 2) }} €</span>
        </div>

        <div class="mb-4">
            <h5>Description</h5>
            <p>{{ $produit->description }}</p>
        </div>

        <div class="mb-4">
            <h5>Disponibilité</h5>
            @if($produit->quantite_stock > 0)
                @if($produit->quantite_stock < 10)
                    <p class="text-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        Plus que {{ $produit->quantite_stock }} en stock !
                    </p>
                @else
                    <p class="text-success">
                        <i class="bi bi-check-circle"></i>
                        En stock ({{ $produit->quantite_stock }} disponibles)
                    </p>
                @endif
            @else
                <p class="text-danger">
                    <i class="bi bi-x-circle"></i>
                    Rupture de stock
                </p>
            @endif
        </div>

        <div class="mb-4">
            <h5>Catégorie</h5>
            <a href="{{ route('products.category', $produit->categorie) }}" class="text-decoration-none">
                <span class="badge bg-secondary">{{ $produit->categorie->nom }}</span>
            </a>
        </div>

        @if($produit->quantite_stock > 0)
        <div class="d-grid gap-2">
            <button class="btn btn-primary btn-lg">
                <i class="bi bi-cart-plus"></i> Ajouter au panier
            </button>
        </div>
        @endif
    </div>
</div>

<!-- Related Products -->
<section class="mt-5">
    <h3 class="mb-4">Produits similaires</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($produit->categorie->produits->where('id', '!=', $produit->id)->take(4) as $relatedProduct)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/produits/' . $relatedProduct->img_produit) }}" 
                     class="card-img-top" 
                     alt="{{ $relatedProduct->nom }}"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $relatedProduct->nom }}</h5>
                    <p class="card-text">{{ Str::limit($relatedProduct->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 mb-0">{{ number_format($relatedProduct->prix, 2) }} €</span>
                        <a href="{{ route('products.show', $relatedProduct) }}" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Voir détails
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection 