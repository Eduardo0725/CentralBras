@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/selectWayToGetPaidOfAd.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <form class="boxDefault shadow" action="{{ route('myaccount.ads.create.warranty') }}" method="post">
            @csrf

            <h1>Formas de receber pagamento</h1>

            <div class="WaysToGetPaid">
                <div class="WayToGetPaid">
                    <input class="none" type="radio" name="WaysToGetPaid" id="pagseguro" value="pagseguro">

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
        <div class="boxDefault shadow">
            <h2>Dados do PagSeguro</h2>

            <input class="email inputText" type="email" placeholder="Email">

            <div class="tokenDiv">
                <input class="token inputText" type="text" placeholder="Token">

                <div>
                    <img src="{{ asset('images/icons/question.svg') }}" alt="Ajuda">

                    <div class="pagseguroInfo">
                        <ol class="boxDefault shadow">
                            <li>Acesse a sua <a href="https://acesso.pagseguro.uol.com.br/" target="_blank">Conta
                                    PagSeguro</a></li>
                            <li>No menu lateral, selecione <b>Venda online</b></li>
                            <li>Vá na opção <b>Integrações</b></li>
                            <li>E pressione o botão <b>Gerar Token</b></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="buttonDiv">
                <button class="buttonDefault buttonGreen" id="buttonPagSeguro" type="button">
                    Concluído
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/selectWayToGetPaidOfAd.js') }}"></script>
@endsection
