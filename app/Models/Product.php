<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = []; // Permite que tudo que foi enviado pelo POST possa ser atualizado.

    public function category(){
        return $this->belongsTo('App\Models\Categoria'); // Pertence a 1 categoria. Categoria é parte forte relação.
    }

    // Produto está em muitos pedidos
    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido');
    }

}
