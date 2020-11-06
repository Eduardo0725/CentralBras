@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/creationOfFinishedAd.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <div class="finished boxDefault shadow">
            <h1>Pronto!</h1>

            <div class="buttons">
                <a class="buttonDefault buttonBlue">Visualizar anúncio</a>
                <a href="{{ route('myaccount.ads') }}" class="buttonDefault buttonBlue">Voltar para anúncios</a>
                <a href="{{ route('myaccount.ads.create') }}" class="buttonDefault buttonBlue">Anunciar outro</a>
            </div>
        </div>
    </div>
@endsection
