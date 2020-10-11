@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymentConfirmed.css') }}">
@endsection

@section('content')
    <div class="divBox boxDefault flexColumn">
        <h1>Compra confirmada!</h1>

        <div class="flexRow">
            <a class="buttonDefault buttonBlue" href="">Visualizar compras</a>
            <a class="buttonDefault buttonRed" href="{{ route('main') }}">Ir para a página inicial</a>
        </div>
    </div>
@endsection
