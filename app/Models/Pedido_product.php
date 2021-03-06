<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_product extends Model
{
    use HasFactory;

    protected $table = 'pedido_product';

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    public function pedido() {
        return $this->belongsTo('App\Models\Pedido');
    }
}
