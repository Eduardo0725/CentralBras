@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/config.css') }}">
@endsection

@section('content')
    <div id="box">
        <h1>Configurações</h1>

        <form id="formPhoto" class="none" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PATCH')

            <input class="none" type="file" name="photo" id="inputPhoto">
        </form>

        <div class="accountData">
            <div class="photo">
                <img src="{{ $user->photo ? env('APP_STORAGE') . $user->photo : asset('images/icons/user.svg') }}" alt="photo">

                <label for="inputPhoto">Mudar Foto</label>
            </div>

            <div class="buttonsConfig">
                <a class="userName" onclick="addDivAlterProperties('{{ route('users.update', ['user' => $user->id]) }}', 'PATCH', '{{ csrf_token() }}', 'Alterar apelido do usuário', 'username', 'Apelido', '{{ $user->userName }}')">
                    <p>Usuário</p>
                    <p>{{ $user->userName }}</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <label class="emailAndPasswordUser" for="alterEmailAndPassword">
                    <p>E-mail e senha</p>
                    <p>{{ $user->email }}</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </label>
            </div>
        </div>

        <div class="personalData">
            <h2>Dados da conta</h2>

            <div class="buttonsConfig">
                <a class="nameCompleteUser" onclick="addDivAlterProperties('{{ route('users.update', ['user' => $user->id]) }}', 'PATCH', '{{ csrf_token() }}', 'Alterar nome', 'name', 'Nome', '{{ $user->name }}')">
                    <p>Primeiro Nome</p>
                    <p>{{ $user->name }}</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <a class="nameCompleteUser" onclick="addDivAlterProperties('{{ route('users.update', ['user' => $user->id]) }}', 'PATCH', '{{ csrf_token() }}', 'Alterar sobrenome', 'surname', 'Sobrenome', '{{ $user->surname }}')">
                    <p>Sobrenome</p>
                    <p>{{ $user->surname }}</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <a class="CPFOrCNPJUser" onclick="addDivAlterProperties('{{ route('users.update', ['user' => $user->id]) }}', 'PATCH', '{{ csrf_token() }}', 'Alterar CPF/CNPJ', 'cpf', 'CPF/CNPJ', '{{ $user->cpf }}')">
                    <p>CPF/CNPJ</p>
                    <p>{{ $user->cpf }}</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>

                <a class="phoneUser" onclick="addDivAlterProperties('{{ route('users.update', ['user' => $user->id]) }}', 'PATCH', '{{ csrf_token() }}', 'Alterar número de telefone', 'phone', 'Número de telefone', '{{ $user->phone }}')">
                    <p>Telefone</p>
                    <p>{{ $user->phone }}</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </a>
            </div>
        </div>

        <div class="cards">
            <h2>Cartões</h2>

            <div>
                @if ($user->cards)
                    @foreach ($user->cards as $card)
                        <div class="configCard">
                            <div>
                                <img src="https://www.comerciodigital.pt/media/2263/mastercard_novo.png?anchor=center&mode=crop&quality=85&rnd=132346257210000000" alt="arrow-right">

                                <div class="infoCard">
                                    <p>Terminado em {{ substr($card->cardNumber, -4) }}</p>
                                    <p>Nome do banco</p>
                                    <p>Vencimento: {{ $card->monthOfValidity }}/20{{ $card->yearOfValidity }}</p>
                                </div>
                            </div>

                            <form class="formAsLink" action="{{ route('cards.destroy', $card->id) }}" method="post">
                                @csrf

                                @method('DELETE')

                                <button type="submit">Excluir</button>
                            </form>
                        </div>
                    @endforeach
                @endif

                <label class="configLabel" for="createCard">
                    <p>Adicionar novo cartão</p>

                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="arrow-right">
                </label>
            </div>
        </div>

        <div class="addresses">
            <h2>Endereços</h2>

            <div>
                @foreach ($user->addresses as $address)
                    <div class="address">
                        <div class="infoAddress">
                            <p>{{ $address->street }}, {{ $address->houseNumber }}</p>
                            <p>{{ $address->complement }}</p>
                            <p>{{ $address->city }} ({{ $address->cep }}), {{ $address->state }}</p>
                            <p>{{ $address->phone }}</p>
                        </div>

                        <div>
                            <div tabindex="1" class="addOptionsBox">
                                <img class="addOptionsBox" src="{{ asset('images/icons/three-dots-vertical.svg') }}" alt="arrow-right">
                            </div>

                            <input class="none" type="radio" name="optionsBox" id="optionsBox1">

                            <div class="boxOptions">
                                <div>
                                    <label class="configLink" for="modifyAddress{{ $address->id }}">Editar</label>

                                    <form class="formAsLink configLink" action="{{ route('addresses.destroy', ['address' => $address->id]) }}" method="POST">
                                        @csrf

                                        @method('DELETE')

                                        <button class="configLink" type="submit">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

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

    <input type="checkbox" class="none" name="options" id="alterEmailAndPassword">

    <div class="alterEmailAndPassword">
        <form id="emailAndPasswordForm" class="boxDefault" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="headerTitleAndClose">
                <h2>Editar email e senha</h2>

                <label for="alterEmailAndPassword">
                    <img class="imgClose" src="{{ asset('images/icons/close.svg') }}" alt="close">
                </label>
            </div>

            <div>
                <div class="divInputs">
                    <input class="inputText configEmail" type="email" name="email" placeholder="Novo email (Deixe vazio para não alterar)" value="{{ $user->email }}">
                    <input class="inputText configPassword" type="password" name="password" placeholder="Senha (Deixe vazio para não alterar)">
                    <input class="inputText configPasswordRepeat" type="password" placeholder="Repetir senha">
                </div>

                <div>
                    <button class="buttonDefault buttonGreen" type="submit">
                        Concluído
                    </button>
                </div>
            </div>
        </form>
    </div>

    <input type="checkbox" class="none" name="options" id="createCard">

    <div id="createCardDiv">
        <x-create-card buttonClose="true" />
    </div>

    @foreach ($user->addresses as $address)
        <x-save-address
            title="Modificar Endereço"
            id="modifyAddress{{ $address->id }}"
            :informations="$address"
            method="PUT"
        />
    @endforeach

    <x-save-address title="Adicionar Endereço" />
@endsection

@section('scripts')
    <script src="{{ asset('js/config.js') }}"></script>

    @if ($errors->has('error'))
        <script>
            setTimeout(()=>{
                alert(@json($errors->get('error')[0]));
            }, 100);
        </script>
    @endif
@endsection
