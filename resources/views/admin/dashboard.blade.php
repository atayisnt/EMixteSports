@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tableau de bord</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card bg-primary text-white shadow-sm">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="icon-shape rounded-circle bg-white text-primary p-3 me-3">
                                            <i class="fas fa-box fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Produits</p>
                                            <h3 class="text-white font-weight-bolder mb-0">{{ $totalProducts ?? 0 }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card bg-success text-white shadow-sm">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="icon-shape rounded-circle bg-white text-success p-3 me-3">
                                            <i class="fas fa-tags fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Catégories</p>
                                            <h3 class="text-white font-weight-bolder mb-0">{{ $totalCategories ?? 0 }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card bg-danger text-white shadow-sm">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="icon-shape rounded-circle bg-white text-danger p-3 me-3">
                                            <i class="fas fa-exclamation-triangle fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Produits en rupture</p>
                                            <h3 class="text-white font-weight-bolder mb-0">{{ $outOfStockProducts ?? 0 }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Accès rapides</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('admin.products.index') }}" class="card shadow-sm text-decoration-none text-dark">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-shape bg-primary text-white rounded-circle p-3 me-3">
                                                <i class="fas fa-box"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Gérer les produits</h6>
                                                <p class="text-sm text-muted mb-0">Ajouter, modifier ou supprimer des produits</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('admin.categories.index') }}" class="card shadow-sm text-decoration-none text-dark">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-shape bg-success text-white rounded-circle p-3 me-3">
                                                <i class="fas fa-tags"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Gérer les catégories</h6>
                                                <p class="text-sm text-muted mb-0">Ajouter, modifier ou supprimer des catégories</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('home') }}" target="_blank" class="card shadow-sm text-decoration-none text-dark">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-shape bg-info text-white rounded-circle p-3 me-3">
                                                <i class="fas fa-globe"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Voir le site</h6>
                                                <p class="text-sm text-muted mb-0">Visiter la boutique en ligne</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 