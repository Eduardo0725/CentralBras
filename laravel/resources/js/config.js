const content = document.querySelector("#content");

function addDivAlterProperties(title = '', nameInput = '', placeholder = '', valueInitial = '', idInput = '', route = '') {
    let html = `
            <div class="alterProps">
                <form class="boxDefault flexColumn" action="${route}">
                    <div class="flexRow headerTitleAndClose">
                        <h2>${title}</h2>
                        <a onclick="removeDiv('.alterProps')">
                            <img class="imgClose" src="/images/icons/close.svg" alt="close">
                        </a>
                    </div>
                    <div class="flexRow">
                        <input
                        class="inputText"
                        type="text"
                        name="${nameInput}"
                        id="${idInput}"
                        placeholder="${placeholder}"
                        value="${valueInitial}"
                        >
                        <button class="buttonDefault buttonGreen" type="submit">
                            Concluído
                        </button>
                    </div>
                </form>
            </div>
            `;

    content.innerHTML += html;
}

function addDivAddOrAlterAddress(title = '', route = '') {
    let html = `
        <div class="addOrAlterAddress">
            <form class="boxDefault flexColumn" action="${route}">
                <div class="flexRow headerTitleAndClose">
                    <h2>${title}</h2>
                    <a onclick="removeDiv('.addOrAlterAddress')">
                        <img class="imgClose" src="/images/icons/close.svg" alt="close">
                    </a>
                </div>

                <input
                class="inputText"
                type="text"
                name="cep"
                placeholder="CEP"
                >

                <div class="flexRow">
                    <input
                    class="inputText"
                    type="text"
                    name="state"
                    placeholder="Estado"
                    >
                    <input
                    class="inputText"
                    type="text"
                    name="city"
                    placeholder="Cidade"
                    >
                </div>

                <div class="flexRow">
                    <input
                    class="inputText"
                    type="text"
                    name="street"
                    placeholder="Rua"
                    >
                    <input
                    class="inputText"
                    type="text"
                    name="numberHome"
                    placeholder="Número"
                    >
                </div>

                <div class="additionalData flexRow">
                    <div class="flexColumn">
                        <input
                        class="inputText"
                        type="text"
                        name="additionalData"
                        placeholder="Dados adicionais (opcional)"
                        >
                        <div class="homeOrWork flexColumn">
                            <p>Este é o seu trabalho ou sua casa?</p>
                            <div class="flexRow">
                                <input
                                type="radio"
                                id="work"
                                name="workOrHome"
                                >
                                <label for="work">
                                    Trabalho
                                </label>

                                <input
                                type="radio"
                                id="home"
                                name="workOrHome"
                                >
                                <label for="home">
                                    Casa
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flexColumn">
                        <input
                        class="inputText"
                        type="text"
                        name="phone"
                        placeholder="Telefone de contato"
                        >
                        <p>
                            A transportadora ligará para este número, caso tenha algum problema com o envio.
                        </p>
                    </div>
                </div>
                <div class="buttonConcluded">
                    <button class="buttonDefault buttonGreen" type="submit">
                        Concluído
                    </button>
                </div>
            </form>
        </div>
    `;

    content.innerHTML += html;
}

function removeDiv(query) {
    document.querySelector(query).remove();
}
