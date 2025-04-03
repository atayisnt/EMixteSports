@extends('admin.layouts.layout')

@section('title', 'Nouveau Produit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Nouveau Produit</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du produit</label>
                            <input type="text" 
                                   class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" 
                                   name="nom" 
                                   value="{{ old('nom') }}" 
                                   required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="prix" class="form-label">Prix (€)</label>
                                <input type="number" 
                                       class="form-control @error('prix') is-invalid @enderror" 
                                       id="prix" 
                                       name="prix" 
                                       value="{{ old('prix') }}" 
                                       step="0.01" 
                                       min="0" 
                                       required>
                                @error('prix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="quantite_stock" class="form-label">Quantité en stock</label>
                                <input type="number" 
                                       class="form-control @error('quantite_stock') is-invalid @enderror" 
                                       id="quantite_stock" 
                                       name="quantite_stock" 
                                       value="{{ old('quantite_stock') }}" 
                                       min="0" 
                                       required>
                                @error('quantite_stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="id_Categorie" class="form-label">Catégorie</label>
                            <select class="form-select @error('id_Categorie') is-invalid @enderror" 
                                    id="id_Categorie" 
                                    name="id_Categorie" 
                                    required>
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" 
                                            {{ old('id_Categorie') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_Categorie')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="img_produit" class="form-label">Image du produit</label>
                            <input type="file" 
                                   class="form-control @error('img_produit') is-invalid @enderror" 
                                   id="img_produit" 
                                   name="img_produit" 
                                   accept="image/*"
                                   required>
                            @error('img_produit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                L'image doit être au format JPG, PNG, ou GIF et ne pas dépasser 2MB.
                            </small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Créer le produit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 