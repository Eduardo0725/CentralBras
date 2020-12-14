<input class="saveAddressInput none" type="checkbox" id="{{ $id }}">

<div class="saveAddress">
    <form class="saveAddressForm boxDefault">
        @csrf

        <div class="headerTitleAndClose">
            <h2>{{ $title }}</h2>

            <label for="{{ $id }}"></label>
        </div>

        <input name="cep" class="cep inputText" type="text" placeholder="CEP" value="{{ $cep }}">

        <div class="flexRow">
            <input name="state" class="state inputText" type="text" placeholder="Estado" value="{{ $state }}">
            <input name="city" class="city inputText" type="text" placeholder="Cidade" value="{{ $city }}">
        </div>

        <div class="flexRow">
            <input name="street" class="street inputText" type="text" placeholder="Rua" value="{{ $street }}">
            <input name="houseNumber" class="numberHome inputText" type="text" placeholder="Número" value="{{ $number }}">
        </div>

        <div class="additionalData flexRow">
            <input name="complement" class="additionalData inputText" type="text" placeholder="Dados adicionais (opcional)" value="{{ $complement }}">

            <div>
                <input name="phone" class="phone inputText" type="text" placeholder="Telefone de contato" value="{{ $phone }}">
                <p>
                    A transportadora ligará para este número, caso tenha algum problema com o envio.
                </p>
            </div>
        </div>

        <div class="buttonConcluded">
            <button class="buttonDefault buttonGreen" type="submit" for="saveAddressForm">
                Concluído
            </button>
        </div>
    </form>
</div>
