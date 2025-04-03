@extends('admin.layouts.layout')

@section('title', 'Modifier la Catégorie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Modifier la Catégorie</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la catégorie</label>
                            <input type="text" 
                                   class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" 
                                   name="nom" 
                                   value="{{ old('nom', $category->nom) }}" 
                                   required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="img_Categorie" class="form-label">Image actuelle</label>
                            <div class="mb-2">
                                <img src="{{ asset('images/categories/' . $category->img_Categorie) }}" 
                                     alt="{{ $category->nom }}" 
                                     class="img-thumbnail"
                                     style="max-width: 200px;">
                            </div>
                            <input type="file" 
                                   class="form-control @error('img_Categorie') is-invalid @enderror" 
                                   id="img_Categorie" 
                                   name="img_Categorie" 
                                   accept="image/*">
                            @error('img_Categorie')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Laissez vide pour conserver l'image actuelle. L'image doit être au format JPG, PNG, ou GIF et ne pas dépasser 2MB.
                            </small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 