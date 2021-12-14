@extends('layouts.main')
@section('title', 'Carrinho de Compras')

@section('content')
<div class="colo-md-10 offset-md-1 dashboard-title-container">
    <h1>Carrinho de Compras</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if (count($produtos->products) > 0 )
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
                @foreach($produtos->products as $produto)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td> xxxx </td>
                        <td> {{ $produto->preco }} </td>
                        <td> xxxx </td>
                        <td>
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon> Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">{{ $produtos->valor_total }}</th>
                    <th scope="col"></th>
                </tr>
            </tbody>
        </table>
    @else
        <p>Você ainda não tem produtos no carrinho! <a href="/welcome">Voltar às compras</a></p>
    @endif
</div>
@endsection