@extends('layouts.main')
@section('title', 'Cadastrar Categoria')

@section('content')
    <div class="col-md-6 offset-md-3">
        <h1>Cadastrar Categoria</h1>
        <form action="/produts_category" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Nome da categoria: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da categoria">
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Categoria">
        </form>
    </div>
@endsection