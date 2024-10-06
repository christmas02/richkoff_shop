<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Galerie extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_product', 'image'
    ];

    public static function getGallerie($code_produict)
    {
        try{
            $galerie = Galerie::where('code_product',$code_produict)->get();
            return $galerie;

        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }

    }
}
