@extends('layouts.main')
@section('title', 'Cadastrar Produtos')

@section('content')
    <div class="col-md-6 offset-md-3">
        <h1>Cadastrar Produto</h1>
        <form action="/produts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="categoria">Categoria do produto:</label>
            <select class="form-control" name="categoria" id="categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{{ $categoria->id }}}">{{{ $categoria->title }}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Imagem do produto:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Nome do produto: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do produto">
        </div>
        <div class="form-group">
            <label for="preco">Preço: </label>
            <input type="number" class="form-control" id="preco" name="preco" placeholder="R$ XX,XX">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade: </label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Digite a quantidade que será inserida">
        </div>
        <div class="form-group">
            <label for="description">Descrição do produto:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descreva o produto"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Produto">
    </form>
    </div>
@endsection