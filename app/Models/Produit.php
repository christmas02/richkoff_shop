<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public static function getAllProduct(){
        try{
            $products = Produit::where('archive',null)->get();
            $i = 0;
            $product = [];

            foreach ($products as $value){
                $categoryProduct = Categorie::find($value->categorie);
                $subcategoryProduct = Souscategorie::find($value->souscategorie);

                $product[$i]["id"] = $value->id;
                $product[$i]["name"] = $value->nom;
                $product[$i]["amount"] = $value->montant;
                $product[$i]["quantity"] = $value->stock;
                $product[$i]["description"] = $value->description;
                $product[$i]["category"] = $categoryProduct->name;
                $product[$i]["subcategory"] = $subcategoryProduct->name;
                $product[$i]["picture"] = $value->image;
                $product[$i]["code_product"] = $value->code_product;
                $product[$i]["slug"] = $value->slug;
                $product[$i]["date_publication"] = $value->created_at;
                $product[$i]["code_product"] = $value->code_product;

                $i++;

            }
            return $product;

        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }
    public function allbuyproduct(){
        
    }

    public static function productBysouscategorie($idSouscategorie){
        $products = Produit::where('souscategorie',$idSouscategorie)->get();
        $i = 0;
        $product = [];

        foreach ($products as $value){
            $categoryProduct = Categorie::find($value->categorie);
            $subcategoryProduct = Souscategorie::find($value->souscategorie);

            $product[$i]["id"] = $value->id;
            $product[$i]["name"] = $value->nom;
            $product[$i]["amount"] = $value->montant;
            $product[$i]["quantity"] = $value->stock;
            $product[$i]["description"] = $value->description;
            $product[$i]["category"] = $categoryProduct->name;
            $product[$i]["subcategory"] = $subcategoryProduct->name;
            $product[$i]["picture"] = $value->image;
            $product[$i]["slug"] = $value->slug;
            $product[$i]["date_publication"] = $value->created_at;
            $product[$i]["code_product"] = $value->code_product;

            $i++;

        }
        return $product;
    }

    public static function getProduct($codeProduct)
    {
        $getProduct = Produit::where('code_product',$codeProduct)->first();
        $galerie = Galerie::where('code_product',$codeProduct)->get();
        $categoryProduct = Categorie::find($getProduct->categorie);
        $subcategoryProduct = Souscategorie::find($getProduct->souscategorie);

        $product = [
            "id" => $getProduct->id,
            "name" => $getProduct->nom,
            "amount" => $getProduct->montant,
            "quantity" => $getProduct->stock,
            "description" => $getProduct->description,
            "category" => $categoryProduct->name,
            "idcategory" => $getProduct->categorie,
            "subcategory" => $subcategoryProduct->name,
            "idsubcategory" => $getProduct->souscategorie,
            "picture" => $getProduct->image,
            "slug" => $getProduct->slug,
            "archive" => $getProduct->archive,
            "date_publication" => $getProduct->created_at,
            "code_product" => $getProduct->code_product,
            "galerie" => $galerie
        ];
        return $product;
    }
}
