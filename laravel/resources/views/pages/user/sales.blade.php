@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/sales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <div class="titleAndButton">
            <h1>Vendas</h1>
            <a class="ads buttonDefault buttonBlue" href="{{ route('myAccountAds') }}">Anúncios</a>
        </div>

        <div class="barOfStateWithFilterAndOrder shadow boxDefault">
            <div class="optionsOfState">
                <p>1 Para preparar</p>
                <p>1 Pronto para enviar</p>
                <p>1 Em trânsito</p>
                <p>1 Concluído</p>
            </div>

            <div class="filterAndOrder">
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

        <div class="salesLot ">
            @for ($i = 1; $i <= 5; $i++)
                <div class="saleProduct shadow boxDefault">
                    <div class="status">
                        <p>Para preparar</p>

                        <div>
                            <img tabindex="1" class="addOptionsBox" src="{{ asset('images/icons/three-dots-vertical.svg') }}" alt="Opções">

                            <input class="none" type="radio" name="optionsBox">

                            <div class="optionsBox">
                                <div>
                                    <a href="{{ route('myAccountSalesDetails') }}">Detalhes</a>
                                    <a>Editar</a>
                                    <a>Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="saleInfo">
                        <div class="product">
                            <img src="{{ asset('images/image.svg') }}" alt="Produto">

                            <p>Nome do produto</p>
                        </div>

                        <div class="priceAndAmount">
                            <p>R$ 0,00</p>
                            <p>0 unidades</p>
                        </div>

                        <div class="categories">
                            <p>Categoria escolhida</p>
                        </div>

                        <div class="buyerInfo">
                            <img src="{{ asset('images/icons/user.svg') }}" alt="Fornecedor">

                            <div class="info">
                                <p>Nome do comprador</p>
                                <p>example@email.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
@endsection
