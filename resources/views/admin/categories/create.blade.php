@extends('admin.layouts.layout')

@section('title', 'Nouvelle Catégorie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Nouvelle Catégorie</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la catégorie</label>
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
                            <label for="img_Categorie" class="form-label">Image de la catégorie</label>
                            <input type="file" 
                                   class="form-control @error('img_Categorie') is-invalid @enderror" 
                                   id="img_Categorie" 
                                   name="img_Categorie" 
                                   accept="image/*"
                                   required>
                            @error('img_Categorie')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                L'image doit être au format JPG, PNG, ou GIF et ne pas dépasser 2MB.
                            </small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Créer la catégorie
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 