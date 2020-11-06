@extends('layout.base');

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymethod.css') }}">
@endsection

@section('content')
    <form class="boxDefault" action="{{ route('purchases.review') }}">

        <input class="none" type="radio" name="paymethod" id="paymethod1" value="0" checked>
        <input class="none" type="radio" name="paymethod" id="paymethod2" value="1">
        <input class="none" type="radio" name="paymethod" id="paymethod3" value="2">

        <div class="labels flexColunm">
            <h2>Tipo de pagamento</h2>

            <div class="flexRow">
                <label for="paymethod1">Cartão de Crédito</label>
                <label for="paymethod2">Débito Online</label>
                <label for="paymethod3">Boleto</label>
            </div>
        </div>

        <div class="flexColumn paymethod1">
            <div>
                <h2>Dados do Cartão de Crédito</h2>

                <input class="inputText" type="text" maxlength="16" minlength="16" name="numberOfCard" placeholder="Número do Cartão">
                <input class="inputText" type="text" maxlength="18" name="holderNameOfCard" placeholder="Nome do Titular do Cartão">

                <input class="inputText" type="text" maxlength="2" minlength="2" name="monthOfValidity" placeholder="Mês de validade">
                <input class="inputText" type="text" maxlength="4" minlength="4" name="yearOfValidity" placeholder="Ano de validade">
                <input class="inputText" type="text" maxlength="3" minlength="3" name="cvv" placeholder="CVV">
                <input class="inputText" type="text" maxlength="11" minlength="11" name="cardHoldersCPF" placeholder="CPF do dono do Cartão">

                <input class="inputText" type="date" name="dateOfBirth" empty="true">
                <select class="inputText" type="text" name="numberOfInstallments">
                    <option>Quantidade de parcelas</option>
                </select>
            </div>

            <div>
                <h2>Endereço do Titular do Cartão</h2>

                <input class="inputText" maxlength="8" minlength="8" type="text" name="cep" placeholder="CEP">
                <input class="inputText" type="text" name="state" placeholder="Estado">
                <input class="inputText" type="text" name="city" placeholder="Cidade">
                <input class="inputText" type="text" name="neighborhood" placeholder="Bairro">
                <input class="inputText" type="text" name="street" placeholder="Rua">
                <input class="inputText" type="text" name="number" placeholder="Número">
                <input class="inputText" type="text" name="complement" placeholder="Complemento">
            </div>

        </div>

        <div class="paymethod2 flexColumn">
            <h2>Selecione o Banco</h2>

            <select class="inputText" type="text" name="numberOfInstallments">
                <option>Selecione o banco</option>
            </select>

            <p>
                Você vai ser redirecionado para a página do banco.
            </p>
        </div>

        <div class="paymethod3"></div>

        <div class="flexRow">
            <button class="buttonDefault buttonGreen" type="submit">Continuar compra</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function pattern(query, reSet, reClass = '', uppercase = false, maxLenght = -1) {
            document.querySelector(query).onkeypress = function(e) {
                let key = e.key;
                if (key.search(new RegExp(reSet, reClass)) == -1)
                    return false;

            }
        }

        pattern('.paymethod1 div input[name=numberOfCard]', '[0-9]');
        pattern('.paymethod1 div input[name=holderNameOfCard]', '[a-z ]', 'i');
        pattern('.paymethod1 div input[name=monthOfValidity]', '[0-9]');
        pattern('.paymethod1 div input[name=yearOfValidity]', '[0-9]');
        pattern('.paymethod1 div input[name=cvv]', '[0-9]');
        pattern('.paymethod1 div input[name=cardHoldersCPF]', '[0-9]');
        pattern('.paymethod1 div input[name=cep]', '[0-9]');
        pattern('.paymethod1 div input[name=state]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');
        pattern('.paymethod1 div input[name=city]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');
        pattern('.paymethod1 div input[name=neighborhood]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');
        pattern('.paymethod1 div input[name=street]', '[a-z0-9]', 'i');
        pattern('.paymethod1 div input[name=number]', '[a-z0-9]', 'i');
        pattern('.paymethod1 div input[name=complement]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');

        document.querySelector('.paymethod1 div input[name=dateOfBirth]').addEventListener('change', function(e) {
            let doc = document.querySelector('.paymethod1 div input[name=dateOfBirth]');

            if(doc.getAttribute('empty'))
                doc.setAttribute('empty', 'false');
        })
    </script>
@endsection
