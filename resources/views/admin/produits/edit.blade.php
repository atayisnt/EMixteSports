@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Modifier le produit</h6>
                </div>
                <div class="card-body px-4 pt-0 pb-2">
                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.products.update', $produit->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom" class="form-control-label">Nom du produit</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prix" class="form-control-label">Prix (€)</label>
                                    <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantite_stock" class="form-control-label">Quantité en stock</label>
                                    <input type="number" class="form-control" id="quantite_stock" name="quantite_stock" value="{{ old('quantite_stock', $produit->quantite_stock) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_Categorie" class="form-control-label">Catégorie</label>
                                    <select class="form-control" id="id_Categorie" name="id_Categorie" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {{ old('id_Categorie', $produit->id_Categorie) == $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $produit->description) }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="img_produit" class="form-control-label">Image du produit</label>
                            <div class="mb-2">
                                <img src="{{ asset('images/produits/'.$produit->img_produit) }}" alt="{{ $produit->nom }}" class="img-thumbnail" style="max-height: 150px;">
                                <p class="text-xs text-secondary mb-0">Image actuelle</p>
                            </div>
                            <input type="file" class="form-control" id="img_produit" name="img_produit" accept="image/*">
                            <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle. Formats acceptés: JPG, PNG, GIF. Taille max: 2MB.</small>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour le produit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 