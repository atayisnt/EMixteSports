@extends('admin.layouts.layout')

@section('title', 'Gestion des Produits')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des Produits</h1>
    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nouveau Produit
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>
                            <img src="{{ asset('images/produits/' . $produit->img_produit) }}" 
                                alt="{{ $produit->nom }}" 
                                class="img-thumbnail"
                                style="max-width: 50px;">
                        </td>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->categorie->nom }}</td>
                        <td>{{ number_format($produit->prix, 2) }} €</td>
                        <td>
                            <span class="badge {{ $produit->quantite_stock < 10 ? 'bg-danger' : 'bg-success' }}">
                                {{ $produit->quantite_stock }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.produits.edit', $produit->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Modifier
                                </a>
                                <form action="{{ route('admin.produits.destroy', $produit->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($produits->hasPages())
        <div class="mt-4">
            {{ $produits->links() }}
        </div>
        @endif
    </div>
</div>
@endsection 