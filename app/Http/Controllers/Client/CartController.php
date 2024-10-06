<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\Confirmedcommande;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Souscategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Cart as Cart;
use App\Services\Pdfboncommande;


class CartController extends Controller
{
    //
    public static function code()
    {
        try{
            // Générer un nombre aléatoire entre 0 et 9999
            $randomNumber = mt_rand(0, 9999);
            // Formatter le nombre avec des zéros à gauche pour qu'il ait toujours 4 chiffres
            $formattedNumber = str_pad($randomNumber, 4, '0', STR_PAD_LEFT);
            return $formattedNumber;

        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }
    Public function listCategorie(){
        $categorie = Categorie::all();
        return $categorie;
    }

    Public function listSouscategorie(){
        $souscategorie = Souscategorie::all();
        return $souscategorie;
    }

    public function index()
    {
        $content = Cart::getContent();
        $categories = $this->listCategorie();
        $souscategories = $this->listSouscategorie();
        //dd($content);
        $total = Cart::getTotal();
        $cartCount = Cart::getTotalQuantity();
        //dd($content, $total, $cartCount);
        return view('/client/panier', compact('content', 'cartCount', 'total','categories' , 'souscategories' ));
    }

    public function checkout()
    {
        try {
            //code...
            $content = Cart::getContent();
            $total = Cart::getTotal();
            $subTotal = Cart::getSubTotal();
            $cartCount = Cart::getTotalQuantity();
            $categories = $this->listCategorie();
            $souscategories = $this->listSouscategorie();

            return view('/client/checkout', compact("subTotal", "cartCount", 'content', 'total' ,'categories' , 'souscategories'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }

    }

    public function shop()
    {

        $listProduit = Produit::leftjoin('categories', 'categories.id', '=', 'produits.categorie')
            ->where('categories.etat', '=', 1)
            ->get();
        $cartCount = Cart::getTotalQuantity();
        $listCategorie = Categorie::getcategorie();
        return view('shop/shop', compact('listProduit', 'listCategorie', 'cartCount'));

    }

    public function showproduit($slug)
    {
        try {
            //code...
            $cartCount = Cart::getTotalQuantity();
            $findProduit = Produit::where('slug', $slug)->first();
            $imageProduit = Picture::where('slugproduit', $slug)->get();
            return view('shop/produit', compact('findProduit', 'cartCount', 'imageProduit'));

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function store(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        //dd($produit->image);

        $cart = Cart::add([
            'id' => $produit->id,
            'name' => $produit->nom,
            'price' => $produit->montant,
            'picture' => $produit->image,
            'quantity' => $request->quantity,
        ]);
        //dd($cart->getContent());
        return redirect('/mon_panier')->with('cart', 'Votre produit a bien ete ajouter au panier');

    }

    public function boot()
    {
        View::composer(['templates/header', 'products.show'], function ($view) {
            $view->with([
                'cartCount' => Cart::getTotalQuantity(),
                'cartTotal' => Cart::getTotal(),
            ]);
        });
    }

    public function update(Request $request)
    {
        dd($request->all());
        Cart::update($request->productId, [
            'quantity' => ['relative' => false, 'value' => $request->quantity],
        ]);
        $content = Cart::getContent();

        return redirect()->back()->with('cart', 'Votre produit a bien ete ajouter au panier');
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
        Cart::remove($request->id);
        return redirect()->back()->with('cart', 'Votre produit a bien ete retirer du panier');
    }

    public function priceByproduct(float $price, int $quantity){
        return $price * $quantity;
    }

    public function newCustomer($data)
    {
        // Recherche du client existant
        $client = Client::where('email', $data->email)
            ->where('phone', $data->phone)
            ->first();
        if($client != null){
            $image = '';
            $saveClient = Client::saveCustomer($data, $image);
        }

    }

    public function saveCommmande(Request $request)
    {
        try {
            //dd($request->all());
            //code...
            $identification_commande = "COMM".self::code();
            // enregistrement du panier
            $panier = Cart::getContent();
            $total = Cart::getTotal();
            $dataPanier = [];
            $i = 0;
            // organisation des produit
            foreach ($panier as $produit){
                $dataPanier[$i]['id_product'] = $produit->id;
                $dataPanier[$i]['name_product'] = $produit->name;
                $dataPanier[$i]['quantity'] = $produit->quantity;
                $dataPanier[$i]['priceUnit'] = $produit->price;
                $dataPanier[$i]['prices'] = $this->priceByproduct($produit->price , $produit->quantity);
                $i ++;
            }
            // enregistrement de la commande
            $data = Commande::store($request, $identification_commande, json_encode($dataPanier), $total);
            // envois de mail de confirmation au client
            $user = ['username'  => $request->username, 'firstname'  => $request->firstname,];
            $pdfContent = Pdfboncommande::generatePdf($data);
            Mail::to($request->email)->send(new Confirmedcommande($pdfContent, $user, $identification_commande));
            // update command after send mail
            Commande::updateCommand($identification_commande);
            // Cline
            // Save new customer
            $data = [
                'name_customer' => $request->username. ' '.$request->firstname,
                'email' => $request->email,
                'phone' => $request->phone,
                'adresse' => $request->lieux_de_livraison,
            ];
            $saveClient = Client::saveCustomer($data);

            Cart::clear();

            return redirect('/')->with('cart', 'Votre commande a bien ete enregistrer');

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
