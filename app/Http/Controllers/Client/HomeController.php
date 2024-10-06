<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Souscategorie;
use Illuminate\Http\Request;
use Cart as Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function listCategorie()
    {
        $categorie = Categorie::all();
        return $categorie;
    }

    public function listSouscategorie()
    {
        $souscategorie = Souscategorie::all();
        return $souscategorie;
    }

    public function index()
    {
        $categories = $this->listCategorie();
        $souscategories = $this->listSouscategorie();
        $products = collect(Produit::getAllProduct());
        $cartCount = Cart::getTotalQuantity();

        return view('client.shoping', [
            'categories' => $categories,
            'souscategories' => $souscategories,
            'products' => $products,
            'cartCount' => $cartCount,
        ]);
    }

    public function produitSouscategorie($id,$name)
    {
        //dd($id,$name);
        $categories = $this->listCategorie();
        $souscategories = $this->listSouscategorie();
        $cartCount = Cart::getTotalQuantity();
        $products = Produit::productBysouscategorie($id);
        //dd($products);
        //$produits = DB::table('produits')->paginate(20);
        return view('client.shoping', [
            'categories' => $categories,
            'souscategories' => $souscategories,
            'products' => $products,
            'cartCount' => $cartCount,
        ]);
    }

    public function showProduit($codeProduct)
    {
        $categories = $this->listCategorie();
        $cartCount = Cart::getTotalQuantity();
        $product = Produit::getProduct($codeProduct);
        //dd($cartCount);
        return view('client.product', [
            'cartCount' => $cartCount,
            'categories' => $categories,
            'product' => $product
        ]);
    }

}
