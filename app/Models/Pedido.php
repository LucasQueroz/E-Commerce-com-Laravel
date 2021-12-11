<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Pertence a muitos produtos
    public function product(){
        return $this->belongsToMany('App\Models\Product');
    }
 
}
