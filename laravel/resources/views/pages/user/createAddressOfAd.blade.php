@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/createAddressOfAd.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createOrChangeAddress.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <form class="boxDefault shadow" action="{{ route('myaccount.ads.create.waysToGetPaid') }}" method="POST">
            @csrf

            <h1>Selecione o endereço da venda</h1>

            <div class="addresses">
                @for ($i = 1; $i <= 5; $i++) {{-- foreach --}}
                    <div class="address">
                        <p>Endereço {{ $i }}</p>
                        <input class="none" type="radio" name="address" id="address{{ $i }}" value="{{ $i }}">
                        <fieldset>
                            <label for="address{{ $i }}">
                            <div class="title">
                                <p>Nome da rua, numero</p>
                                <img src="{{ asset('images/icons/ok.svg') }}" alt="ok">
                            </div>
                            <p>Complemento</p>
                            <p>Cidade (CEP), estado</p>
                            <p>Nome do usuário - numero de contato</p>
                            </label>
                        </fieldset>
                    </div>
                @endfor
            </div>

            <div class="buttonsOfAddressesDiv">
                <label class="buttonDefault buttonBlue" for="addOrAlterAddress">Cadastre um novo endereço</label>
                <button class="buttonDefault buttonGreen" type="submit">Próximo</button>
            </div>
        </form>
    </div>

    @include('components.createOrChangeAddress')
@endsection

@section('scripts')
    <script src="{{ asset('js/createOrChangeAddress.js') }}"></script>
@endsection
