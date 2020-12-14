@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/config.css') }}">
@endsection

@section('content')
    <div id="box">
        <h1>Configurações</h1>

        <div class="accountData">
            <h2>Dados da conta</h2>

            <div class="buttonsConfig">
                <a class="userName" onclick="addDivAlterProperties('', 'GET' ,'Alterar apelido do usuário', 'userName', 'Novo apelido');">
                    <p>Usuário</p>
                    <p>Eduardo Andrade</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <label class="emailAndPasswordUser" for="alterEmailAndPassword">
                    <p>E-mail e senha</p>
                    <p>example@email.com</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </label>
            </div>
        </div>

        <div class="personalData">
            <h2>Dados da conta</h2>

            <div class="buttonsConfig">
                <a class="nameCompleteUser" onclick="addDivAlterProperties('', 'GET' ,'Alterar nome completo', 'nameCompleteUser', 'Nome completo');">
                    <p>Nome completo</p>
                    <p>Eduardo Andrade Carvalho</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <a class="CPFOrCNPJUser" onclick="addDivAlterProperties('', 'GET' ,'Alterar CPF/CNPJ', 'CPFOrCNPJUser', 'CPF/CNPJ');">
                    <p>CPF/CNPJ</p>
                    <p>xxx.xxx.xxx-xx</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <a class="phoneUser" onclick="addDivAlterProperties('', 'GET' ,'Alterar número de telefone', 'phoneUser', 'Número de telefone');">
                    <p>Telefone</p>
                    <p>(xx) x xxxx-xxxx</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>
            </div>
        </div>

        <div class="cards">
            <h2>Cartões</h2>

            <div>
                <div class="configCard">
                    <div>
                        <img src="https://www.comerciodigital.pt/media/2263/mastercard_novo.png?anchor=center&mode=crop&quality=85&rnd=132346257210000000" alt="arrow-right">

                        <div class="infoCard">
                            <p>Terminado em xxxx</p>
                            <p>Nome do banco</p>
                            <p>Vencimento: xx/xxxx</p>
                        </div>
                    </div>

                    <a>Excluir</a>
                </div>

                <div class="configCard">
                    <div>
                        <img src="https://www.comerciodigital.pt/media/2263/mastercard_novo.png?anchor=center&mode=crop&quality=85&rnd=132346257210000000" alt="arrow-right">

                        <div class="infoCard">
                            <p>Terminado em xxxx</p>
                            <p>Nome do banco</p>
                            <p>Vencimento: xx/xxxx</p>
                        </div>
                    </div>

                    <a>Excluir</a>
                </div>

                <div class="configCard">
                    <div>
                        <img src="https://www.comerciodigital.pt/media/2263/mastercard_novo.png?anchor=center&mode=crop&quality=85&rnd=132346257210000000" alt="arrow-right">

                        <div class="infoCard">
                            <p>Terminado em xxxx</p>
                            <p>Nome do banco</p>
                            <p>Vencimento: xx/xxxx</p>
                        </div>
                    </div>

                    <a>Excluir</a>
                </div>
            </div>
        </div>

        <div class="addresses">
            <h2>Endereços</h2>

            <div>
                @for ($i = 0; $i < 3; $i++)
                    <div class="address">
                        <div class="infoAddress">
                            <p>Nome da rua, numero</p>
                            <p>Complemento</p>
                            <p>cidade (CEP), estado</p>
                            <p>nome do usuário - numero de contato</p>
                        </div>

                        <div>
                            <div tabindex="1" class="addOptionsBox">
                                <img class="addOptionsBox" src="{{ asset('images/icons/three-dots-vertical.svg') }}" alt="arrow-right">
                            </div>

                            <input class="none" type="radio" name="optionsBox" id="optionsBox1">

                            <div class="boxOptions">
                                <div>
                                    <label for="modifyAddress{{ $i }}">Editar</label>

                                    <a>Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

                <label for="saveAddress">
                    <p>Adicionar novo endereço</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </label>
            </div>
        </div>

        <div class="connections">
            <h2>Vínculos</h2>

            <div class="buttonsConfig">
                <a>
                    <div>
                        <img src="{{ asset('images/icons/google.svg') }}" alt="arrow-right">

                        <p>Google</p>
                    </div>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>
            </div>
        </div>
    </div>

    @for ($i = 0; $i < 3; $i++)
        <x-save-address title="Modificar Endereço" id="modifyAddress{{ $i }}" />
    @endfor

    <x-save-address title="Adicionar Endereço" />

    <input type="checkbox" class="none" name="options" id="alterEmailAndPassword">

    <div class="alterEmailAndPassword">
        <form class="boxDefault">
            <div class="headerTitleAndClose">
                <h2>Editar email e senha</h2>

                <label for="alterEmailAndPassword">
                    <img class="imgClose" src="{{ asset('images/icons/close.svg') }}" alt="close">
                </label>
            </div>

            <div>
                <div class="divInputs">
                    <input class="inputText" type="email" name="email" placeholder="Novo email (Deixe vazio para não alterar)">
                    <input class="inputText" type="password" name="password" placeholder="Senha (Deixe vazio para não alterar)">
                    <input class="inputText" type="password" placeholder="Repetir senha">
                </div>

                <div>
                    <button class="buttonDefault buttonGreen" id="buttonSubmitEmailAndPassword" onclick="submitEmailAndPassword()" type="button">
                        Concluído
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/config.js') }}"></script>
@endsection
