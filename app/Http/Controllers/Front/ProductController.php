<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $latestProducts = Produit::with('categorie')
            ->latest()
            ->take(5)
            ->get();

        $categories = Categorie::withCount('produits')->get();

        return view('front.products.index', compact('latestProducts', 'categories'));
    }

    public function show(Produit $produit)
    {
        return view('front.products.show', compact('produit'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $produits = Produit::with('categorie')
            ->where('nom', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(12);
        
        return view('front.products.search', compact('produits', 'query'));
    }

    public function byCategory(Categorie $category)
    {
        $produits = Produit::with('categorie')
            ->where('id_Categorie', $category->id)
            ->paginate(12);
        
        return view('front.products.produitsCategorie', compact('produits', 'category'));
    }

    public function latest()
    {
        $produits = Produit::with('categorie')
            ->latest()
            ->take(5)
            ->get();
        
        return view('front.products.latest', compact('produits'));
    }

    public function all()
    {
        $produits = Produit::with('categorie')
            ->latest()
            ->paginate(50);
        
        return view('front.products.all', compact('produits'));
    }
}
