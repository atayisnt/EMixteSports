@extends('admin.layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Produits</h5>
                <h2 class="mb-0">{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Total Catégories</h5>
                <h2 class="mb-0">{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-dark">
            <div class="card-body">
                <h5 class="card-title">Produits Stock Faible</h5>
                <h2 class="mb-0">{{ $lowStockProducts }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Valeur Totale Stock</h5>
                <h2 class="mb-0">{{ number_format($totalInventoryValue, 2) }} €</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Derniers Produits Ajoutés</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestProducts as $product)
                            <tr>
                                <td>{{ $product->nom }}</td>
                                <td>{{ $product->categorie->nom }}</td>
                                <td>{{ number_format($product->prix, 2) }} €</td>
                                <td>{{ $product->quantite_stock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Produits par Catégorie</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Nombre de Produits</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productsByCategory as $category)
                            <tr>
                                <td>{{ $category['name'] }}</td>
                                <td>{{ $category['count'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="card-title mb-0">Produits en Stock Faible (< 10)</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Stock Actuel</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowStockProductsDetails as $product)
                            <tr>
                                <td>{{ $product->nom }}</td>
                                <td>{{ $product->categorie->nom }}</td>
                                <td>{{ $product->quantite_stock }}</td>
                                <td>{{ number_format($product->prix, 2) }} €</td>
                                <td>
                                    <a href="{{ route('admin.produits.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i> Modifier
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 