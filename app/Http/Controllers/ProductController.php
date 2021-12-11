<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\models\Categoria;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();

        return view('welcome', ['products' => $products]);
    }

    public function show($id){
        $product = Product::findOrFail($id);

        return view('products/show', ['product' => $product]);
    }

    public function create(){
        $categorias = Categoria::all();

        return view('products/create', ['categorias' => $categorias]);
    }

    public function create_category(){
        return view('products/category');
    }

    public function dashboard(){
        $products = Product::all();
        
        return view('/dashboard', ['products' => $products]);
    }

    public function edit($id){
        $product = Product::findOrfail($id);

        return view('products.edit', ['product' => $product]);
    }

    public function destroy($id){
        Product::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function update(Request $request){

        $data = $request->all();
        // Imagem Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName);

            $data['image'] = $imageName;
        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Produto editado com sucesso!');
    }

    public function store(Request $request){
        $product = new Product;

        $product->image = $request->image;
        $product->title = $request->title;
        $product->preco = $request->preco;
        $product->quantidade = $request->quantidade;
        $product->description = $request->description;
        $product->categoria_id = $request->categoria;
        
        // Imagem Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName);

            $product->image = $imageName;
        }

        $product->save();

        return redirect('/dashboard')->with('msg', 'Produto criado com sucesso!');
    }

    public function store_category(Request $request){
        $categoria = new Categoria;

        $categoria->title = $request->title;

        $categoria->save();

        return redirect('/dashboard')->with('msg', 'Categoria criada com sucesso!');
    }
}
