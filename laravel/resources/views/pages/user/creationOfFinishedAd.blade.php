@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/creationOfFinishedAd.css') }}">
@endsection

@section('content')
    <div id="box" data-dusk="finished">
        <div class="finished boxDefault shadow">
            <h1>Pronto!</h1>

            <div class="buttons">
                <a href="{{ route('product', ['product' => $idProduct]) }}" class="buttonDefault buttonBlue">Visualizar anúncio</a>
                <a href="{{ route('myaccount.ads.index') }}" class="buttonDefault buttonBlue">Voltar para anúncios</a>
                <a href="{{ route('myaccount.ads.create') }}" class="buttonDefault buttonBlue">Anunciar outro</a>
            </div>
        </div>
    </div>
@endsection
