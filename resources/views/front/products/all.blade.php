@extends('front.layouts.app')

@section('title', 'Tous les Produits')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tous les Produits</li>
    </ol>
</nav>

<div class="mb-4">
    <h1>Tous nos Produits</h1>
    <p class="text-muted">{{ $produits->total() }} produits disponibles</p>
</div>

@if($produits->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i>
        Aucun produit n'est disponible pour le moment.
    </div>
@else
    <div class="row">
        <!-- Filters Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Filtres</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.all') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Prix</label>
                            <div class="input-group mb-2">
                                <input type="number" 
                                       name="min_price" 
                                       class="form-control" 
                                       placeholder="Min"
                                       value="{{ request('min_price') }}">
                                <span class="input-group-text">-</span>
                                <input type="number" 
                                       name="max_price" 
                                       class="form-control" 
                                       placeholder="Max"
                                       value="{{ request('max_price') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catégories</label>
                            @foreach(App\Models\Categorie::all() as $categorie)
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="categories[]" 
                                       value="{{ $categorie->id }}"
                                       id="cat{{ $categorie->id }}"
                                       {{ in_array($categorie->id, request('categories', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat{{ $categorie->id }}">
                                    {{ $categorie->nom }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Disponibilité</label>
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="in_stock" 
                                       value="1"
                                       id="inStock"
                                       {{ request('in_stock') ? 'checked' : '' }}>
                                <label class="form-check-label" for="inStock">
                                    En stock uniquement
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-funnel"></i> Appliquer les filtres
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
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
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <a href="{{ route('products.category', $produit->categorie) }}" class="text-decoration-none">
                                        {{ $produit->categorie->nom }}
                                    </a>
                                </small>
                                <small class="text-muted">
                                    @if($produit->quantite_stock > 0)
                                        @if($produit->quantite_stock < 10)
                                            <span class="text-warning">
                                                <i class="bi bi-exclamation-triangle"></i>
                                                Stock faible
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
                                            Rupture
                                        </span>
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $produits->links() }}
            </div>
        </div>
    </div>
@endif
@endsection 