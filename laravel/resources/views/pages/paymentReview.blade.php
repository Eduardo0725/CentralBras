@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymentReview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productRow.css') }}">
@endsection

@section('content')
    <form class="flexColumn boxDefault" action="{{ route('purchases.confirmed') }}">
        <h1>Revise e Confirme</h1>

        <div class="flexColumn cart">
            <h2>Carrinho</h2>

            <div>
                @foreach ($contents as $content)
                @include('components.productRow', ['product' => $content, 'links' => false, 'amount' => true])
                @endforeach
            </div>
        </div>

        <hr>

        <div class="flexColumn frete">
            <div class="flexRow">
                <h2>Envio</h2>
                <a class="linkPut" href="">Alterar</a>
            </div>

            <p>Nome da rua, número,</p>
            <p>Cidade, estado, CEP</p>

            <div class="flexRow">
                <p>Frete: Econômico</p>
                <p>R$ 23,90</p>
            </div>
        </div>

        <hr>

        <div class="flexColumn payment">
            <div class="flexRow">
                <h2>Pagamentos</h2>
                <a class="linkPut" href="">Alterar</a>
            </div>

            <p>Cartão de crédito</p>
            <p>Terminado com xxxx</p>
            <div class="flexRow">
                <p>Parcela 6x sem juros (R$ 753,90)</p>
                <div class="flexRow">
                    <p>Juros</p>
                    <p>R$ 0,00</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="flexRow total">
            <div class="flexRow">
                <p>Total</p>
                <p>R$ 4.523,40</p>
            </div>
        </div>

        <hr>

        <div class="divButton flexRow">
            <button class="buttonDefault buttonGreen" type="submit">Confirmar compra</button>
        </div>
    </form>
@endsection
