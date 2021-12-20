<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{
    public function add($id, Request $request){
        $user = auth()->user();
        $product = Product::findOrfail($id);
        $pedido = new Pedido;

        $pedido->user_id = $user->id;
        //$pedido->valor_total = $product->preco * $request->quantidade;
        
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

        $pedidoProducts = DB::table('pedido_product')
        ->select('pedido_product.quantidade as quantidade', 'products.preco as preco', 'products.title as title', 'pedido_product.id as id')
        ->where('pedido_id', '=', $pedido->id)
        ->join('products', 'products.id', '=', 'pedido_product.product_id')->get();
        
        return view('/clientes/carrinho', ['pedidoProducts' => $pedidoProducts])->with('msg', 'Produto adicionado ao carrinho do id=');
    }

}
