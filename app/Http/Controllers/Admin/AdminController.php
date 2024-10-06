<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Galerie;
use App\Models\Historicproduct;
use App\Models\Produit;
use App\Models\Souscategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.pages.index');
    }
    //
    Public function listCategorie(){
        $categorie = Categorie::all();
        return $categorie;
    }
    Public function listSouscategorie(){
        $souscategorie = Souscategorie::all();
        return $souscategorie;
    }
    public static function uploadFile($image): string
    {
        $fichier_name = time() . '.' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $fichier_name);
        return $fichier_name;
    }
    public function historiqStockProduct($code_product, $quantity)
    {
        try{
            // status operation 1 = Approvisionement
            $historic = new Historicproduct;
            $historic->code_product = $code_product;
            $historic->quantity = $quantity;
            $historic->operation = 1;
            $historic->description = 'Approvisionement du stock';

            $historic->save();

        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }
    public static function codeProduct($category)
    {
        try{
            $categoryInfo = Categorie::find($category);
            $code_category = $categoryInfo->code;
            // Générer un nombre aléatoire entre 0 et 9999
            $randomNumber = mt_rand(0, 9999);
            // Formatter le nombre avec des zéros à gauche pour qu'il ait toujours 4 chiffres
            $formattedNumber = str_pad($randomNumber, 4, '0', STR_PAD_LEFT);

            return $code_category.$formattedNumber;


        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }

    // Product methode
    public function createProduct(){
        $category = $this->listCategorie();
        return view('admin.pages.creatProduct', ['categories' => $category]);
    }
    public function ajaxSouscategorie(Request $request)
    {
        $cat_id = $request->query('cat_id');
        //dd($cat_id);
        $subCategory = Souscategorie::where('categorie_id','=',$cat_id)->get();
        return response()->json($subCategory);
    }
    public function listProduct()
    {
        $produits = Produit::getAllProduct();
        //dd($produits);
        return view('admin.pages.listProduct', ['produits' => $produits]);
    }
    public function saveProduct(Request $request)
    {
        //dd($request->all());
        try{
            $name = $request->name;
            $amount = $request->amount;
            $description = $request->description;
            $category = $request->categorie;
            $subcategory = $request->souscategorie;
            $quantity = $request->quantity;

            $image = self::uploadFile($request->picture);
            $slug = $name.$category;

            $codeProduct = $this->codeProduct($category);

            DB::beginTransaction();
            $product = new Produit;
            $product->nom = $name;
            $product->montant = $amount;
            $product->description = $description;
            $product->souscategorie = $subcategory;
            $product->categorie = $category;
            $product->image = $image;
            $product->stock = $quantity;
            $product->code_product = $codeProduct;

            $product->nbrvente = 0;
            $product->slug = $slug;
            $product->save();

            $images = array();
            if ($files = $request->file('images')) {
                if (count($files) <= 4) {
                    foreach ($files as $itemFile) {
                        if ($itemFile->isValid()) {
                            $name = self::uploadFile($itemFile);
                            Galerie::create([
                                'image' => $name,
                                'code_product' => $codeProduct
                            ]);
                        } else {
                            // Gérer les erreurs de validation du fichier
                            return redirect()->back()->with('danger', "Un ou plusieurs image de la galerie ne sont pas valides.");
                        }
                    }
                } else {
                    $cotaValide = count($files) - 1;
                    return redirect()->back()->with('danger', "Enregistrement impossible, vous disposez d'un quota de 4 images");
                }
            }

            $this->historiqStockProduct($codeProduct,$quantity);

            DB::commit();

            return redirect('/list/product')->with('success', 'La nouvelle catégorie a été bien eregistre');

        }catch(\Throwable $th){
            dd($th);
            Log::error($th->getMessage());
            DB::rollback();
            return back()->with('error', 'Une erreur est survenus !');        }
    }
    public function detailProduct($code_product)
    {
        try{
            //dd($code_product);
            $category = $this->listCategorie();
            $product =  Produit::getProduct($code_product);
            $historicProduct = Historicproduct::historicByproduit($code_product);
            $galerie = Galerie::getGallerie($code_product);
            //dd($galerie);
            return view('admin.pages.detailProduct',[ 'historicProduct' => $historicProduct,'categories' => $category,'product'=> $product, 'galerie' => $galerie]);
        }catch (\Throwable $th){
            dd($th);
            Log::error($th->getMessage());
            return back()->with('danger', 'Une erreur est survenus !');        }
    }

    public function saveApprovisionnement(Request $request)
    {
        try{
            //dd($request->all());
            $code_product = $request->code_product;
            $new_quantity = $request->new_quantity;
            $old_quantity = $request->old_quantity;

            DB::beginTransaction();
            $product = Produit::where('code_product',$code_product)->first();
            $product->stock = ($old_quantity + $new_quantity);
            $product->save();

            $this->historiqStockProduct($code_product,($old_quantity + $new_quantity));
            DB::commit();

            return back()->with('success', 'La nouvelle catégorie a été bien eregistre');

        }catch (\Throwable $th){
            Log::error($th->getMessage());
            DB::rollback();
            return back()->with('error', 'Une erreur est survenus !');
        }
    }

    public function updateProduct(Request $request)
    {
        try{
            ///dd($request->all());
            $code_product = $request->code_product;

            $name = $request->name;
            $amount = $request->amount;
            $description = $request->description;
            $category = $request->categorie;
            $subcategory = $request->souscategorie;

            $product = Produit::where('code_product',$code_product)->first();
            $product->nom = $name;
            $product->montant = $amount;
            $product->description = $description;
            $product->souscategorie = $subcategory;
            $product->categorie = $category;
            $product->save();

            return back()->with('success', 'La mise a jour du produit a été bien éffèctuer');

        }catch(\Throwable $th){
            Log::error($th->getMessage());
            return back()->with('error', 'Une erreur est survenus !');        }

    }

    public function updatePicture(Request $request)
    {
        try{
            //dd($request->all());
            $code_product = $request->code_product;
            $image = self::uploadFile($request->picture);
            $product = Produit::where('code_product',$code_product)->first();
            $product->image = $image;
            $product->save();

            return back()->with('success', 'La mise a jour du produit a été bien éffèctuer');

        }catch(\Throwable $th){
            Log::error($th->getMessage());
            return back()->with('error', 'Une erreur est survenus !');
        }
    }

    public function saveValueArchive(Request $request)
    {
        try{
            dd($request->all());
        }catch(\Throwable $th){
            Log::error($th->getMessage());
            dd($th->getMessage());
        }

    }

    // Category methode
    public function listCategory()
    {
        $category = $this->listCategorie();
        return view('admin.pages.listCategory', ['categories' => $category]);
    }
    public function saveCategory(Request $request)
    {
        //dd($request->all());
        try{
            $nom_category = $request->get('nom_categ');
            $code_category = $request->get('code_categ');
            $etat = '1';

            $category = new Categorie;
            $category->name = $nom_category;
            $category->code = $code_category;
            $category->statut = $etat;

            $category->save();
            return redirect('/list/categorie')->with('success', 'La nouvelle catégorie a été bien eregistre');

        }catch(\Throwable $th){
            //dd($th);
            Log::error($th->getMessage());
            return redirect('/list/categorie')->with('error', $th->getMessage());
        }
    }
    public function updateCategory(Request $request)
    {
        try{
            $nom_category = $request->get('nom_category');
            $id_category = $request->get('id_category');
            $category =  Categorie::find($id_category);
            $category->name = $nom_category;
            $category->save();
            return redirect('/list/categorie')->with('success', 'La nouvelle sous catégorie a été bien eregistre');
        }catch(\Throwable $th){
            //dd($th);
            Log::error($th->getMessage());
            return redirect('/list/categorie')->with('error', $th->getMessage());
        }
    }

    // Sub Category methode
    public function listSubcatgory()
    {
        $subCategory = $this->listSouscategorie();
        $category = $this->listCategorie();
        //dd($subCategory, $category);
        return view('admin.pages.listSubcategory', ['souscategorie' => $subCategory, 'categories' => $category]);
    }
    public function saveSouscategory(Request $request)
    {
        //dd($request->all());
        try{
            $nom_subcategory = $request->get('nom_subcategory');
            $id_category = $request->get('id_category');
            $status = '1';

            $souscategory = new Souscategorie;
            $souscategory->categorie_id = $id_category;
            $souscategory->name = $nom_subcategory;
            $souscategory->statut = $status;

            $souscategory->save();
            return redirect('/list/sous/categorie')->with('success', 'La nouvelle sous catégorie a été bien eregistre');

        }catch(\Throwable $th){
            //dd($th);
            Log::error($th->getMessage());
            return redirect('/list/sous/categorie')->with('error', $th->getMessage());
        }
    }
    public function updateSouscategory(Request $request)
    {
        try{
            $nom_subcategory = $request->get('nom_subcategory');
            $id_subcategory = $request->get('id_subcategory');
            $souscategory =  Souscategorie::find($id_subcategory);
            $souscategory->name = $nom_subcategory;
            $souscategory->save();
            return redirect('/list/sous/categorie')->with('success', 'La nouvelle sous catégorie a été bien eregistre');

        }catch(\Throwable $th){
            //dd($th);
            Log::error($th->getMessage());
            return redirect('/list/sous/categorie')->with('error', $th->getMessage());
        }
    }
}
