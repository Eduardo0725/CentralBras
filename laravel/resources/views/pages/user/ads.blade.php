@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/ads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <div class="titleAndOptions">
            <h1>Anúncios</h1>

            <div class="optionsAdsAndFilter">
                <a class="buttonAds buttonDefault buttonBlue" href="{{ route('myaccount.ads.create') }}">Anúnciar</a>

                <button class="buttonDefault buttonRed">Filtrar</button>

                <div class="barOfOrder">
                    <p>Ordenar por:</p>

                    <select name="barOfOrder" id="barOfOrder">
                        <option value="recent">Mais Recentes</option>
                        <option value="old">Mais Antigos</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="ads">
            @for ($i = 1; $i <= 5; $i++)
                <div class="ad boxDefault shadow">
                    <div class="info">
                        <div class="imgProduct">
                            <img src="{{ asset('images/image.svg') }}" alt="Produto">

                            <p>Nome do produto</p>
                        </div>

                        <div class="priceAndAmount">
                            <p>R$ 0,00</p>
                            <p>0 unidades</p>
                        </div>

                        <div class="freteAndSalesAmount">
                            <p>Frete: Correios</p>
                            <p>Vendas: 0</p>
                        </div>

                        <div class="buttonsOfOptions">
                            <button class="button buttonDefault buttonBlue">Variações</button>
                            <button class="button buttonDefault buttonBlue">Descrição</button>
                            <button class="button buttonDefault buttonBlue">Mídia</button>
                            <button class="button buttonDefault buttonBlue">Comentários</button>
                        </div>
                    </div>

                    <div class="optionsOfDetails">
                        <img tabindex="1" class="addOptionsBox" src="{{ asset('images/icons/three-dots-vertical.svg') }}" alt="Opções">

                        <input class="none" type="radio" name="optionsBox">

                        <div class="optionsBox">
                            <div>
                                <a>Detalhes</a>
                                <a>Editar</a>
                                <a>Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
