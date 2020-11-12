@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/shopping.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['shopping' => true])

    <div id="box">
        <h1>Compras</h1>

        <div class="shoppingLot">
            @for ($i = 1; $i <= 5; $i++)
                <div class="purchase boxDefault">
                    <div class="headerTitleAndButton">
                        <h2>Entregue dia 27 de agosto</h2>

                        <button class="buttonDefault buttonBlue">
                            Comprar novamente
                        </button>
                    </div>

                    <div class="purchaseInfo">
                        <div class="imgAndInfo">
                            <img src="{{ asset('images/image.svg') }}" alt="Produto">
                            <div class="info">
                                <p>Nome do produto</p>
                                <p>Categoria escolhida</p>
                                <p>R$ 0,00 x 0 unidades</p>
                            </div>
                        </div>

                        <div class="vendorInfo">
                            <img src="{{ asset('images/icons/user.svg') }}" alt="Fornecedor">
                            <div class="info">
                                <p>Vendedor</p>
                                <p>Nome do vendedor</p>
                            </div>
                        </div>

                        <a href="{{ route('myaccount.purchases.purchase') }}">Ver detalhes</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
