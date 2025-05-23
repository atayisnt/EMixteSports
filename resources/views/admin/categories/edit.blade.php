@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Modifier la catégorie</h6>
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
                    
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nom" class="form-control-label">Nom de la catégorie</label>
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

                        <div class="form-group mt-3">
                            <label for="img_Categorie" class="form-control-label">Image actuelle</label>
                            <div class="mb-2">
                                <img src="{{ asset('images/categories/' . $category->img_Categorie) }}" 
                                     alt="{{ $category->nom }}" 
                                     class="img-thumbnail"
                                     style="max-height: 150px;">
                                <p class="text-xs text-secondary mb-0">Image actuelle</p>
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

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-light me-2">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 