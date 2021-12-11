@extends('layouts.main')
@section('title', 'Carrinho de Compras')

@section('content')
<div class="colo-md-10 offset-md-1 dashboard-title-container">
    <h1>Carrinho de Compras</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if (count($products) > 0 )
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do produtos</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço (R$)</th>
                    <th scope="col">Subtotal (R$)</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->quantidade }}</td>
                        <td>R$ {{ $product->preco }}</td>
                        <th><a href="/produts/edit/{{ $product->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a>
                            <form action="/produts/{{ $product->id }}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon> Deletar</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem produtos no carrinho! <a href="/welcome">Voltar às compras</a></p>
    @endif
</div>
@endsection