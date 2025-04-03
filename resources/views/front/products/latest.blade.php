@extends('front.layouts.app')

@section('title', 'Derniers Produits')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Derniers Produits</li>
    </ol>
</nav>

<div class="mb-4">
    <h1>Derniers Produits Ajoutés</h1>
    <p class="text-muted">Découvrez nos dernières nouveautés</p>
</div>

@if($produits->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i>
        Aucun produit n'est disponible pour le moment.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($produits as $produit)
        <div class="col">
            <div class="card h-100">
                <div class="position-relative">
                    <img src="{{ asset('images/produits/' . $produit->img_produit) }}" 
                         class="card-img-top" 
                         alt="{{ $produit->nom }}"
                         style="height: 200px; object-fit: cover;">
                    <span class="position-absolute top-0 start-0 badge bg-primary m-2">
                        Nouveau
                    </span>
                </div>
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
                        Catégorie: 
                        <a href="{{ route('products.category', $produit->categorie) }}" class="text-decoration-none">
                            {{ $produit->categorie->nom }}
                        </a>
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection 