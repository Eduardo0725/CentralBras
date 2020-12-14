@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymentConfirmed.css') }}">
@endsection

@section('content')
    <div id="box" class="boxDefault">
        <h1>Compra confirmada!</h1>

        <div>
            <a class="buttonDefault buttonBlue">Visualizar compras</a>
            <a class="buttonDefault buttonRed" href="{{ route('main') }}">Ir para a página inicial</a>
        </div>
    </div>
@endsection
