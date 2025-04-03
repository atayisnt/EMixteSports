<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get basic statistics
        $totalProducts = Produit::count();
        $totalCategories = Categorie::count();
        $lowStockProducts = Produit::where('quantite_stock', '<', 10)->count();
        
        // Get products by category statistics
        $productsByCategory = Categorie::withCount('produits')
            ->get()
            ->map(function ($category) {
                return [
                    'name' => $category->nom,
                    'count' => $category->produits_count
                ];
            });

        // Get latest products
        $latestProducts = Produit::with('categorie')
            ->latest()
            ->take(5)
            ->get();

        // Get low stock products details
        $lowStockProductsDetails = Produit::with('categorie')
            ->where('quantite_stock', '<', 10)
            ->get();

        // Calculate total inventory value
        $totalInventoryValue = Produit::sum(DB::raw('prix * quantite_stock'));

        return view('admin.index', compact(
            'totalProducts',
            'totalCategories',
            'lowStockProducts',
            'productsByCategory',
            'latestProducts',
            'lowStockProductsDetails',
            'totalInventoryValue'
        ));
    }
}
