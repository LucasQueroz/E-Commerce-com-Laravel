<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Product;

class CarrinhoController extends Controller
{
    public function add($id, Request $request){
        $user = auth()->user();
        $product = Product::findOrfail($id);
        $pedido = new Pedido;

        $pedido->user_id = $user->id;
        $pedido->valor_total = $product->preco * $request->quantidade;
        
        if(count(Pedido::where([['user_id', '=', $user->id], 
        ['status', '=', 'Reservado']])->get()->toArray()) == 0){
            $pedido->save();
        } else {
            $pedido_query = Pedido::where([['user_id', '=', $user->id], ['status', '=', 'Reservado']])->first();
            $pedido_query->valor_total += $pedido->valor_total;
            Pedido::where('id', $pedido_query->id)->update(['valor_total' => $pedido_query->valor_total]);
            $pedido = $pedido_query;
        }
        
        $pedido->products()->attach($id, ['quantidade' => $request->quantidade]);

        //dd();
        
        //$pedidos = Pedido::where([['user_id', '=', $user->id], ['status', '=', 'Reservado']])->get();
        $produtos = Pedido::with(['products', 'pedido_product'])->find($pedido->id);

        //dd($produtos);
        
        return view('/clientes/carrinho', ['produtos' => $produtos])->with('msg', 'Produto adicionado ao carrinho do id=');;
    }
}
