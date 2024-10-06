<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Historicproduct extends Model
{
    use HasFactory;
    public static function historiqStockProduct($data)
    {
        try{
            // status operation 1 = Approvisionement
            $historic = new Historicproduct;
            $historic->code_product = $data['code_product'];
            $historic->quantity = $data['quantity'];
            $historic->operation = $data['operation'];
            $historic->description = $data['description'];

            $historic->save();

            return $historic;

        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }
    }

    public static function historicByproduit($code_produict)
    {
        try{
            $historic = Historicproduct::where('code_product',$code_produict)->get();
            return $historic;

        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }
    }
}
