<form class="createCard" action="{{ route('cards.store') }}" method="POST">
    @csrf

    @if ($buttonClose)
        <div class="createCardClose">
            <label for="createCard">
                <img src="{{ asset('images/icons/close.svg') }}" alt="close">
            </label>
        </div>
    @endif

    <div class="createCardData">
        <h2>Dados do Cartão de Crédito</h2>

        <div>
            <input class="inputText" type="text" maxlength="16" minlength="16" name="cardNumber" placeholder="Número do Cartão">
            <input class="inputText" type="text" maxlength="18" name="cardHouder" placeholder="Nome do Titular do Cartão">

            <div>
                <input class="inputText" type="text" maxlength="2" minlength="2" name="monthOfValidity" placeholder="Mês de validade">
                <input class="inputText" type="text" maxlength="2" minlength="2" name="yearOfValidity" placeholder="Ano de validade">
                <input class="inputText" type="text" maxlength="3" minlength="3" name="cvv" placeholder="CVV">
            </div>

            <input class="inputText" type="text" maxlength="11" minlength="11" name="cardHolderCPF" placeholder="CPF do dono do Cartão">

            <input class="inputText" type="date" name="cardHolderDateOfBirth">

            <select class="inputText" type="text" name="numberOfInstallments">
                <option value="null">Quantidade de parcelas</option>
            </select>
        </div>
    </div>

    <div>
        <h2>Endereço do Titular do Cartão</h2>

        <div>
            <input class="inputText" maxlength="8" minlength="8" type="text" name="cep" placeholder="CEP">
            <input class="inputText" type="text" name="state" placeholder="Estado">
            <input class="inputText" type="text" name="city" placeholder="Cidade">
            <input class="inputText" type="text" name="street" placeholder="Rua">
            <input class="inputText" type="text" name="houseNumber" placeholder="Número">
            <input class="inputText" type="text" name="complement" placeholder="Complemento">
        </div>
    </div>

    <div class="divButtons">
        <button class="buttonDefault buttonGreen" type="submit">Continuar compra</button>
    </div>
</form>
