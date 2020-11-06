<input class="none" type="checkbox" id="addOrAlterAddress">

<div class="addOrAlterAddress">
    <form class="boxDefault flexColumn">
        <div class="flexRow headerTitleAndClose">
            <h2>{{ $title ?? 'Adicionar' }}</h2>
            <label for="addOrAlterAddress"></label>
        </div>

        <input class="cep inputText" type="text" placeholder="CEP">

        <div class="flexRow">
            <input class="state inputText" type="text" placeholder="Estado">
            <input class="city inputText" type="text" placeholder="Cidade">
        </div>

        <div class="flexRow">
            <input class="street inputText" type="text" placeholder="Rua">
            <input class="numberHome inputText" type="text" placeholder="Número">
        </div>

        <div class="additionalData flexRow">
            <div class="flexColumn">
                <input class="additionalData inputText" type="text" placeholder="Dados adicionais (opcional)">
                <div class="homeOrWork flexColumn">
                    <p>Este é o seu trabalho ou sua casa?</p>
                    <div class="flexRow">
                        <input type="radio" id="work" name="workOrHome" checked>
                        <label for="work">
                            Trabalho
                        </label>

                        <input type="radio" id="home" name="workOrHome">
                        <label for="home">
                            Casa
                        </label>
                    </div>
                </div>
            </div>

            <div class="flexColumn">
                <input class="phone inputText" type="text" placeholder="Telefone de contato">
                <p>
                    A transportadora ligará para este número, caso tenha algum problema com o envio.
                </p>
            </div>
        </div>
        <div class="buttonConcluded">
            <button class="buttonDefault buttonGreen" type="button" for="addOrAlterAddress">
                Concluído
            </button>
        </div>
    </form>
</div>
