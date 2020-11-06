@php
    $total = 0;
    foreach ($contentsCart as $value) {
        $total += $value['cost'];
    }
@endphp

@extends('layout.base')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/cartAndFavorites.css') }}">
<link rel="stylesheet" href="{{ asset('css/productRow.css') }}">
<link rel="stylesheet" href="{{ asset('css/boxOfNumbers.css') }}">
@endsection

@section('content')
    <div id="box" class="boxDefault">
        <input class="none" type="radio" name="cartAndFavorites" id="radioCart" {{ (!$cartOrFavorite) ? 'checked' : ''}}>
        <input class="none" type="radio" name="cartAndFavorites" id="radioFavorites" {{ ($cartOrFavorite) ? 'checked' : ''}}>

        <div id="options" class="flexRow">
            <label for="radioCart" class="labelSelected">Carrinho ({{ count($contentsCart) }})</label>
            <label for="radioFavorites">Favoritos ({{ count($contentsFavorites) }})</label>
        </div>

        <hr>

        <div id="cart" class="flexColumn">
            <div class="flexColumn">
                @foreach ($contentsCart as $cart)
                    @include('components.productRow', ['product' => $cart, 'qtd' => true])
                @endforeach
            </div>

            <div class="flexRow">
                <p>Produtos ({{ count($contentsCart) }})</p>
                <p>R$ {{ number_format($total, 2, ',', '.') }}</p>
            </div>

            <a href="{{ route('purchases.frete') }}" class="cartButton buttonDefault buttonGreen">Continuar compra</a>
        </div>

        <div id="favorites">
            <div class="flexColumn">
                @foreach ($contentsFavorites as $cart)
                    @include('components.productRow', ['product' => $cart, 'addCart' => true])
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/boxOfNumbers.js') }}"></script>
@endsection
