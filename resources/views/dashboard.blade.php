@extends('layouts.main')
@section('title', 'Deshboard')

@section('content')
<div class="colo-md-10 offset-md-1 dashboard-title-container">
    <h1>Produtos Cadastrados</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($products) > 0 )
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do produtos</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->quantidade }}</td>
                        <td>R$ {{ $product->preco }}</td>
                        <th><a href="/produts/edit/{{ $product->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Ainda não tem produto cadastrado, <a href="/products/create">Cadastrar produto</a></p>
    @endif
</div>
@endsection