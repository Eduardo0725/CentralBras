@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymentReview.css') }}">
@endsection

@section('content')
    <form id="box" class="boxDefault" action="{{ route('purchases.confirmed') }}">
        <h1>Revise e Confirme</h1>

        <div class="cart">
            <h2>Carrinho</h2>

            <div>
                @foreach ($contents as $content)
                    <x-product-row :product="$content" links="false" amount="true" />
                @endforeach
            </div>
        </div>

        <hr>

        <div class="frete">
            <div>
                <h2>Envio</h2>
                <a class="linkPut">Alterar</a>
            </div>

            <p>Nome da rua, número,</p>
            <p>Cidade, estado, CEP</p>

            <div>
                <p>Frete: Econômico</p>
                <p>R$ 23,90</p>
            </div>
        </div>

        <hr>

        <div class="payment">
            <div>
                <h2>Pagamentos</h2>
                <a class="linkPut">Alterar</a>
            </div>

            <p>Cartão de crédito</p>
            <p>Terminado com xxxx</p>
            <div>
                <p>Parcela 6x sem juros (R$ 753,90)</p>
                <div>
                    <p>Juros</p>
                    <p>R$ 0,00</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="total">
            <div>
                <p>Total</p>
                <p>R$ 4.523,40</p>
            </div>
        </div>

        <hr>

        <div class="divButton">
            <button class="buttonDefault buttonGreen" type="submit">Confirmar compra</button>
        </div>
    </form>
@endsection
