<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscategorie extends Model
{
    use HasFactory;
    public function Caterogie(){
        return $this->belongsTo(Caterogies::class);
    }
}
