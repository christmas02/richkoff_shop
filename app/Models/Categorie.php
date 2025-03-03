<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    public function sousCategorie(){
        return $this->hasMany(Souscategorie::class);
    }

    public static function getCategorieId($name){
        return Categorie::where('code',$name)->first();
    }
}
