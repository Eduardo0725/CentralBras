@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/selectWayToGetPaidOfAd.css') }}">
@endsection

@section('content')
    <div id="box" data-dusk="wayToGetPaidOfAd">
        <form class="boxDefault shadow" action="{{ route('myaccount.ads.store') }}" method="post">
            @csrf

            <h1>Formas de receber pagamento</h1>

            <div class="WaysToGetPaid">
                <div class="WayToGetPaid">
                    <input class="none" type="radio" name="waysToGetPaid" id="pagseguro" value="pagseguro">

                    <div class="WayToGetPaidImage pagseguro">
                        <img src="{{ asset('images/pagseguro.png') }}" alt="PagSeguro">
                        <div>
                            <p>PagSeguro</p>
                            <img src="{{ asset('images/icons/ok.svg') }}" alt="ok">
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttonSubmit">
                <button class="buttonDefault buttonGreen" type="submit">Próximo</button>
            </div>
        </form>
    </div>

    <div id="pagseguroData">
        <form id="createPagseguro" class="boxDefault shadow">
            @csrf

            <h2>Dados do PagSeguro</h2>

            <input class="email inputText" name="type" type="hidden" value="pagseguro">

            <input class="email inputText" name="email" type="email" placeholder="Email">

            <div class="tokenDiv">
                <input class="token inputText" name="token" type="text" placeholder="Token">

                <div>
                    <img src="{{ asset('images/icons/question.svg') }}" alt="Ajuda">

                    <div class="pagseguroInfo">
                        <ol class="boxDefault shadow">
                            <li>Acesse a sua
                                <a href="https://acesso.pagseguro.uol.com.br/" target="_blank">Conta PagSeguro</a>
                            </li>
                            <li>No menu lateral, selecione <b>Venda online</b></li>
                            <li>Vá na opção <b>Integrações</b></li>
                            <li>E pressione o botão <b>Gerar Token</b></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="buttonDiv">
                <button class="buttonDefault buttonGreen" id="buttonPagSeguro" type="submit" for="createPagseguro">
                    Concluído
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/selectWayToGetPaidOfAd.js') }}"></script>
@endsection
