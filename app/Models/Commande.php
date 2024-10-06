<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Commande extends Model
{
    use HasFactory;
    public static function getcommande(){
        return Commande::all();
    }
    public static function statusExectutionCommande(){
        return [
            [
                "value" => 1,
                "libel" => 'Executer',
            ],
            [
                "value" => 11,
                "libel" => 'Annuler',
            ],
            [
                "value" => 0,
                "libel" => 'En Attente',
            ]
        ];
    }
    // update champs id_commande de la table bon de commande
    public static function updateCommandafertbc($request)
    {
        try{
            $command = Commande::where('identifiant_commande', $request->id_commande)->first();
            $command->bom_commande = $request->id_bncommande;
            $command->statut = 1;
            $command->save();
            return $command;
        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }

    public static function updateCommand($identification_commande)
    {
        try{
            $command = Commande::where('identifiant_commande', $identification_commande)->first();
            $command->invoice = $identification_commande.'.pdf';
            $command->send_mail = 1;
            $command->save();
        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }

    public static function store($request, $identification_commande, $products, $total){
        try {
            //code...
            // Augmenter la limite de temps d'exécution à 120 secondes
            set_time_limit(120);
            //dd($request->all(), $identification_commande, $products);
            $commande = new Commande;

            $commande->identifiant_commande = $identification_commande;
            $commande->username = $request->username;
            $commande->firstname = $request->firstname;
            $commande->message = $request->message;
            $commande->lieuxdelivraison = $request->lieux_de_livraison;
            $commande->phone = $request->phone;
            $commande->email = $request->email;
            $commande->products = $products;
            $commande->amount = $total;
            $commande->invoice = 'xxxxxxxxxxxxxxxxxx';
            $commande->statut = 0;
            $commande->send_mail = 0;
            $commande->save();
            $data = [
                "id_boncommande" => $identification_commande,
                "amount_ttc" => $total,
                "name_customer" => $request->username.''.$request->firstname,
                "phone_customer" => $request->phone,
                "email_customer" => $request->email,
                "products" => json_decode($products),
            ];
            return $data;

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            //Log::error("modelCommande :",$th->getMessage());
            //dd($th->getMessage());
        }
    }

    public static function firstCommand($identification_commande)
    {
        try{
            $command = Commande::where('identifiant_commande',$identification_commande)->first();
            $products = json_decode($command->products);
            $data_product = [];
            $i = 0;
            //dd($products);
            foreach ($products as $items){
                $product = Produit::find($items->id_product);
                $data_product[$i]["id_product"] = $product->id;
                $data_product[$i]["name"] = $product->nom;
                $data_product[$i]["picture"] = $product->image;
                $data_product[$i]["priceUnit"] = $items->priceUnit;
                $data_product[$i]["prices"] = $items->prices;
                $data_product[$i]["code_product"] = $product->code_product;
                $data_product[$i]["quantity"] = $items->quantity;
                $i++;
            }

            return $data = [
                'command' => $command,
                'products' => $data_product,
            ];

        }catch(\Throwable $th){
            //Log::error("modelCommande :",$th->getMessage());
            dd($th->getMessage());
        }

    }

    public static function updateStatutCommandafterexecute($request){
        try{
            //dd($request);
            // modification du status du bon de command
            $command = Commande::where('identifiant_commande',$request['id_commande'])->first();
            $command->statut = $request['statut'];
            $command->save();

            // mise a jour de la quantité les produit selection
            if ($request['statut'] == 1){
                foreach (json_decode($request['products'])   as $product){
                    $qtyProduct = Produit::where('id',$product->id_product)->first();
                    $newqty = $qtyProduct->stock - $product->quantity;
                    $qtyProduct->stock = $newqty;
                    $qtyProduct->save();

                    $value = [
                        'code_product' => $product->code_product,
                        'quantity' => $product->quantity,
                        'operation' => 0,
                        'description' => 'Execution de la commande, retrait du product',
                    ];
                    //
                    $historic = Historicproduct::historiqStockProduct($value);
                    //dd($historic);
                }
            }

            return $command;

        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }
    }


}
