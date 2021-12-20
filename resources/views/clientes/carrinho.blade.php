@extends('layouts.main')
@section('title', 'Carrinho de Compras')

@section('content')
<div class="colo-md-10 offset-md-1 dashboard-title-container">
    <h1>Carrinho de Compras</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if (count($pedidoProducts) > 0 )
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
                @foreach($pedidoProducts as $pedidoProduct)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $pedidoProduct->title }}</td>
                        <td>{{ $pedidoProduct->quantidade }}</td>
                        <td>{{ $pedidoProduct->preco }}</td>
                        <td>{{ $pedidoProduct->preco * $pedidoProduct->quantidade }}</td>
                        <td>
                            <form action="cliente/carrinho/delete/{{ $pedidoProduct->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon> Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
            </tbody>
        </table>
    @else
        <p>Você ainda não tem produtos no carrinho! <a href="/welcome">Voltar às compras</a></p>
    @endif
</div>
@endsection