@extends('front.layouts.app')

@section('title', 'Résultats de recherche pour "' . $query . '"')

@section('content')
<div class="mb-4">
    <h1>Résultats de recherche</h1>
    <p class="text-muted">
        {{ $produits->total() }} résultat(s) pour "{{ $query }}"
    </p>
</div>

@if($produits->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i>
        Aucun produit ne correspond à votre recherche. Essayez avec d'autres termes ou
        <a href="{{ route('home') }}" class="alert-link">retournez à l'accueil</a>.
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

    <div class="mt-4">
        {{ $produits->appends(['query' => $query])->links() }}
    </div>
@endif
@endsection 