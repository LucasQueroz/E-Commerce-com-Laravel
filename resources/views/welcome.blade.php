@extends('layouts.main')
@section('title', 'E-Commerce Nome')

@section('content')

<div id="event-conteiner" class="col-md-12">
    <div id="cards-conteiner" class="row">
        @foreach ($products as $product)
            <div class="card md-3">
                <img src="/img/products/{{$product->image}}" alt="{{ $product->title }}">
                <div class="card-bory" id="product-info">
                    <p class="card-date">08/12/2021</p>
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-participants"> participantes</p>
                    <a href="/products/show/{{ $product->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($products) == 0)
            <p>Não foi possível encontrar nem um produto! <a href="/">Ver todos</a></p>
        @endif
    </div>
</div>
@endsection