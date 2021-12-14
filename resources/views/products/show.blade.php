@extends('layouts.main')

@section('title', $product->title)
    
@section('content')

<div class="col-md-10- offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/products/{{ $product->image }}" class="img-fluid" alt="{{ $product->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $product->title }}</h1>
            <p class="event-city">R$ {{ $product->preco }} </p>
            <form action="../../cliente/carrinho/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="quantidade">Quantidade: </label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" 
                        value="1" max="{{ $product->quantidade }}" min="1">
                </div>
                <input type="submit" class="btn btn-success" value="Adicionar ao Carrinho">
            </form>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o produto:</h3>
            <p class="event-description">{{ $product->description }}</p>
        </div>
    </div>
</div>

@endsection