@extends('front.layouts.app')

@section('title', 'Produits - ' . $category->nom)

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $category->nom }}</li>
    </ol>
</nav>

<div class="row">
    <!-- Category Info -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/categories/' . $category->img_Categorie) }}" 
                         class="img-fluid rounded-start" 
                         alt="{{ $category->nom }}"
                         style="height: 300px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">{{ $category->nom }}</h1>
                        <p class="card-text">
                            <span class="badge bg-primary">{{ $produits->total() }} produits</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="col-12">
        @if($produits->isEmpty())
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                Aucun produit n'est disponible dans cette catégorie pour le moment.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($produits as $produit)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('images/produits/' . $produit->img_produit) }}" 
                             class="card-img-top" 
                             alt="{{ $produit->nom }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <p class="card-text">{{ Str::limit($produit->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">{{ number_format($produit->prix, 2) }} €</span>
                                <a href="{{ route('products.show', $produit) }}" class="btn btn-primary">
                                    <i class="bi bi-eye"></i> Voir détails
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                @if($produit->quantite_stock > 0)
                                    @if($produit->quantite_stock < 10)
                                        <span class="text-warning">
                                            <i class="bi bi-exclamation-triangle"></i>
                                            Plus que {{ $produit->quantite_stock }} en stock !
                                        </span>
                                    @else
                                        <span class="text-success">
                                            <i class="bi bi-check-circle"></i>
                                            En stock
                                        </span>
                                    @endif
                                @else
                                    <span class="text-danger">
                                        <i class="bi bi-x-circle"></i>
                                        Rupture de stock
                                    </span>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $produits->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 