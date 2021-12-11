<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Product;

class CarrinhoController extends Controller
{
    public function add($id, Request $request){
        $pedido = new Pedido();
        $product = Product::findOrfail($id);
        $user = auth()->user();

        $pedido->user_id = $user->id;
        $pedido->valor_total = $product->preco * $request->quantidade;

        $pedido->save();

        $pedido = Pedido::where(['user_id', '=', $user->id], ['status', '=', 'Reservado'])->first();


        $pedido->product()->attach($id);
        $product->pedidos()->attach($pedido->id);

        //$produtos = Product::findOrfail($id);

        return view('/clientes/carrinho')->with('msg', 'Produto adicionado ao carrinho! id=' . $id . ' quantidade=' . $request->quantidade);;
    }
}
