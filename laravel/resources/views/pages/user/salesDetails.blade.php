@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/salesDetails.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <h1>Detalhes da venda</h1>
        <div id="saleDetails">
            <div class="saleMain">
                <div class="saleSummary boxDefault shadow">
                    <h2>Resumo da venda #código - 27 de agosto</h2>

                    <div class="summary">
                        <div>
                            <p>Pagamento de 2 produtos</p>
                            <p>R$ 0,00</p>
                        </div>
                        <div>
                            <p>Frete</p>
                            <p>R$ 0,00</p>
                        </div>
                    </div>

                    <hr>

                    <div class="total">
                        <p>Total</p>

                        <div>
                            <p>0x R$ 0,00</p>
                            <p>sem juros</p>
                        </div>
                    </div>
                </div>

                <div class="saleMethodPayment boxDefault shadow">
                    <span>
                        <img src="{{ asset('images/icons/card.svg') }}" alt="Forma de pagamento">
                    </span>
                    <div>
                        <p>Pagamento no cartão (0x R$0,00)</p>
                        <p>Pagamento #código aprovado no dia 27 de agosto</p>
                    </div>
                </div>

                <div class="salePlace boxDefault shadow">
                    <span>
                        <img src="{{ asset('images/icons/location.svg') }}" alt="Local de entrega">
                    </span>
                    <div>
                        <p>Nome da rua, numero</p>
                        <p>Complemento</p>
                        <p>cidade (CEP), estado</p>
                        <p>nome do usuário - numero de contato</p>
                    </div>
                </div>
            </div>

            <div class="saleAside boxDefault shadow">
                <h2>Entregue dia 27 de agosto</h2>

                <hr>

                <div class="infoProduct">
                    <img src="{{ asset('images/image.svg') }}" alt="Produto">
                    <div class="info">
                        <a>Nome do produto</a>
                        <p>Categoria escolhida</p>
                        <p>R$ 0,00 x 0 unidades</p>
                    </div>
                </div>

                <div class="vendorInfo">
                    <p>Comprador</p>
                    <p>Nome do comprador</p>
                </div>
            </div>
        </div>
    </div>
@endsection
