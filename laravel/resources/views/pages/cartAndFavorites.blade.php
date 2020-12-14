@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cartAndFavorites.css') }}">
@endsection

@section('content')
    @if ($errors->has('error'))
        <div class="productError">
            <p class="erro">{{ $errors->get('error')[0] }}</p>
        </div>
    @endif

    <div id="box" class="boxDefault">
        <input class="none" type="radio" name="cartAndFavorites" id="radioCart" {{ !$cartOrFavorite ? 'checked' : '' }}>

        @auth
            <input class="none" type="radio" name="cartAndFavorites" id="radioFavorites" {{ $cartOrFavorite ? 'checked' : '' }}>
        @endauth

        <div class="options">
            <label for="radioCart">Carrinho ({{ count($contentsCart) }})</label>

            @auth
                <label for="radioFavorites">Favoritos ({{ count($contentsFavorites) }})</label>
            @endauth
        </div>

        <hr>

        <div id="cart">
            @if ($contentsCart)
                <div class="cartProducts">
                    @foreach ($contentsCart as $cart)
                        <x-product-row :product="$cart" type="shoppingCart" qtd="true" />
                    @endforeach
                </div>

                <div class="cartTotal">
                    <p>Produtos ({{ count($contentsCart) }})</p>
                    <p>R$ {{ number_format($total, 2, ',', '.') }}</p>
                </div>

                <a href="{{ route('purchases.frete') }}" class="cartButton buttonDefault buttonGreen">Continuar compra</a>
            @else
                <div class="cartEmpty">
                    <h1>Você não possui produtos no carrinho.</h1>
                </div>
            @endif
        </div>

        @auth
            <div id="favorites">
                <div>
                    @foreach ($contentsFavorites as $favorite)
                        <x-product-row :product="$favorite" type="favorite" addCart="true" />
                    @endforeach
                </div>
            </div>
        @endauth
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/cartAndFavorites.js') }}"></script>
@endsection
