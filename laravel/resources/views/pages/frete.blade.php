@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/frete.css') }}">
@endsection

@section('content')
    <form class="boxDefault" action="{{ route('purchases.paymethod') }}">
        <h1>Envio</h1>

        <div class="flexRow frete">
            <p>Frete:</p>

            <input class="none" type="radio" name="frete" id="frete1" value="0" checked>
            <input class="none" type="radio" name="frete" id="frete2" value="1">
            <input class="none" type="radio" name="frete" id="frete3" value="2">

            <label for="frete1">Econômico</label>
            <label for="frete2">Expresso</label>
            <label for="frete3">Combinar com o vendedor</label>
        </div>

        <div class="flexColumn address">
            <p>Selecione o endereço da entrega</p>

            <div> {{-- Dinâmico --}}
                @for ($i = 1; $i <= 5; $i++)
                <div class="flexColumn">
                    <input class="none" type="radio" name="address" id="address{{ $i }}" value="{{ $i - 1 }}" {{ $i === 1 ? 'checked' : '' }}>

                    <p>Endereço {{ $i }}</p>

                    <label class="flexColumn" for="address{{ $i }}">
                        <div class="flexRow">
                            <p>Nome da rua, Número</p>
                            <img>
                        </div>

                        <p>Complemento</p>
                        <p>Cidade (CEP), estado</p>
                        <p>Nome do usuário - número de contato</p>
                    </label>
                </div>
                @endfor
            </div>
        </div>

        <p class="freteCost">Valor: R$23,70</p>

        <hr>

        <span>
            <button class="buttonDefault buttonGreen" type="submit">Continuar compra</button>
        </span>
    </form>
@endsection
