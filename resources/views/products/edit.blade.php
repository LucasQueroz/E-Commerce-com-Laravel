@extends('layouts.main')

@section('title', 'Editando o produto ' . $product->title)
    
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando o produto: {{ $product->title }}</h1>
    <form action="/produts/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do produto:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/products/{{ $product->image }}" alt="{{ $product->title }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Produto:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $product->title }}">
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" class="form-control" id="preco" name="preco" value="{{ $product->preco }}">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade"  value="{{ $product->quantidade }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição do produto::</label>
            <input type="text" class="form-control" id="description" name="description"  value="{{ $product->description }}">
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Produto">
    </form>
</div>

@endsection