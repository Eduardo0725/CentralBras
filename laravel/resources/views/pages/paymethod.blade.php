@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymethod.css') }}">
@endsection

@section('content')
    <div id="box" class="boxDefault" action="{{ route('purchases.review') }}">
        <input class="none" type="radio" name="paymethod" id="paymethod1" value="0" checked>
        <input class="none" type="radio" name="paymethod" id="paymethod2" value="1">
        <input class="none" type="radio" name="paymethod" id="paymethod3" value="2">

        <div class="labels">
            <h2>Tipo de pagamento</h2>

            <div>
                <label for="paymethod1">Cartão de Crédito</label>
                <label for="paymethod2">Débito Online</label>
                <label for="paymethod3">Boleto</label>
            </div>
        </div>

        <div class="paymethod1">
            <x-create-card />
        </div>

        <div class="paymethod2">
            <form>
                <h2>Selecione o Banco</h2>

                <select class="inputText" type="text" name="numberOfInstallments">
                    <option>Selecione o banco</option>
                </select>

                <p>
                    Você vai ser redirecionado para a página do banco.
                </p>

                <div class="divButtons">
                    <button class="buttonDefault buttonGreen" type="submit">Continuar compra</button>
                </div>
            </form>
        </div>

        <div class="paymethod3">
            <form>
                <div class="divButtons">
                    <button class="buttonDefault buttonGreen" type="submit">Continuar compra</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/paymethod.js') }}"></script>
@endsection
