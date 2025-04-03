@extends('admin.layouts.layout')

@section('title', 'Gestion des Catégories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des Catégories</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nouvelle Catégorie
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
                        <th>Nombre de Produits</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <img src="{{ asset('images/categories/' . $category->img_Categorie) }}" 
                                alt="{{ $category->nom }}" 
                                class="img-thumbnail"
                                style="max-width: 50px;">
                        </td>
                        <td>{{ $category->nom }}</td>
                        <td>{{ $category->produits->count() }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Modifier
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
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
    </div>
</div>
@endsection 