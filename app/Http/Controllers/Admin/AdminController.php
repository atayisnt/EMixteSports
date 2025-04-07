<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Produit::count();
        $totalCategories = Categorie::count();
        $outOfStockProducts = Produit::where('quantite_stock', 0)->count();

        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'outOfStockProducts'));
    }
}
