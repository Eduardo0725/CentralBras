@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/createProductOfAd.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <form
            id="form"
            class="boxDefault shadow"
            action="{{ route('myAccountCreateAd', ['address']) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <h1>Informações do produto</h1>

            <div class="addImgs">
                <h2>Adicionar fotos</h2>

                <div>
                    {{-- When new images are selected, old images are removed, so a new entry has been created to store all images --}}
                    <input class="none" type="file" id="addImage" multiple>
                    <input type="hidden" name="images" id="images">

                    <label for="addImage">
                        <img class="addImage" src="{{ asset('images/add-image.svg') }}" alt="adicionar imagem">
                    </label>


                    <div class="imgs">
                        {{-- <label class="img">
                            <img src="{{ asset('images/image.svg') }}" alt="">
                        </label> --}}
                    </div>
                </div>
            </div>

            <div class="info">
                <h2>Informações</h2>

                <div class="divInfo">
                    <input class="inputText" type="text" name="productTitle" placeholder="Título">
                    <input class="inputText" type="text" name="productCod" placeholder="Código universal">
                </div>

                <div class="divInfo">
                    <input class="inputText" type="text" name="productBrand" placeholder="Marca">
                    <input class="inputText" type="text" name="productModel" placeholder="Modelo">
                </div>

                <div class="divInfo priceAndAmount">
                    <p>R$ </p>
                    <input class="inputText" type="text" name="productPrice" placeholder="Preço">
                    <input class="inputText" type="text" name="productAmount" placeholder="Quantidade">
                </div>
            </div>

            <div class="productSituation">
                <h2>Qual é a situação do seu produto?</h2>

                <div>
                    <input class="none" type="radio" name="productSituation" id="newProduct" value="new">
                    <label class="buttonDefault" for="newProduct">Novo</label>
                    <input class="none" type="radio" name="productSituation" id="usedProduct" value="used">
                    <label class="buttonDefault" for="usedProduct">Usado</label>
                </div>
            </div>

            <div class="variations">
                <div class="titleWithButton">
                    <h2>Variações</h2>

                    <label class="buttonOfAddWithImgSvg" for="createVariationInDiv"></label>
                </div>

                <div class="variationsInfo">
                    {{-- <div class="variationInfo" data-key="1">
                        <p>Nome da variação </p>

                        <div class="values">
                            <p class="variationValue">Valor 1</p>
                            <p class="variationValue">Valor 2</p>
                            <p class="variationValue">Valor 3</p>
                        </div>

                        <button class="buttonOfChangeWithImgSvg" type="button">
                            <img src="{{ asset('images/icons/pencil-alt-solid.svg') }}" alt="Adicionar">
                        </button>
                    </div> --}}
                </div>

                <input type="hidden" name="variations" id="variations">
            </div>

            <div class="datasheet">
                <h2>Ficha técnica</h2>

                <input type="hidden" name="datasheet" id="datasheet">

                <table>
                    <tbody>
                        {{-- <tr>
                            <td>
                                <textarea type="text" rows="1" class="inputOfTable" placeholder="Nome" wrap="hard"></textarea>
                            </td>
                            <td>
                                <textarea type="text" rows="1" class="inputOfTable" placeholder="Descrição" wrap="hard"></textarea>
                            </td>
                            <td>
                                <button type="button"></button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>

                <div>
                    <button class="buttonNewLine buttonDefault buttonGreen" type="button" for="createValueToDivDatasheet">Nova linha</button>
                </div>
            </div>

            <div class="description">
                <h2>Descrição</h2>

                <textarea name="productDescription" cols="30" rows="10" placeholder="Descreva seu anúncio..."></textarea>
            </div>

            <div class="midia">
                <input class="inputText" type="url" name="midia" placeholder="Vídeo">
            </div>

            <div class="buttonDiv">
                <button id="buttonSubmit" class="button buttonDefault buttonGreen" type="submit">Próximo</button>
            </div>
        </form>
    </div>

    <input class="none" type="checkbox" id="createVariationInDiv">

    <div class="divOfCreateNewVariation">
        <form id="variationForm" class="boxDefault">
            <div class="titleAndButton">
                <h2>Criar uma nova categoria</h2>

                <label class="buttonOfRemoveDiv" for="createVariationInDiv">
                    <img src="/images/icons/close.svg" alt="close">
                </label>
            </div>

            <input class="inputText" type="text" id="variationName" placeholder="Nome da categoria">

            <div class="values">
                <div class="value">
                    <input class="inputText" type="text" placeholder="Valor da categoria" first>
                    {{-- <button type="button" class="buttonOfRemove">
                        <img src="/images/icons/close.svg" alt="close">
                    </button> --}}
                </div>
            </div>

            <div class="buttons">
                <button class="buttonDefault buttonBlue" type="button" id="buttonOfAddNewValue">Criar novo valor</button>
                <button class="buttonDefault buttonGreen" type="button" id="buttonOfconcluded" data-key_of_alteration="null">Concluído</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    const inputAddImage = document.querySelector('input#addImage');
    const inputImages = document.querySelector('input#images');
    var imagesBase64 = {};

    const inputVariations = document.querySelector('#variations');
    const createVariationInDiv = document.querySelector('#createVariationInDiv');
    const variationFormValues = document.querySelector('#variationForm .values');
    const variationName = document.querySelector('#variationForm #variationName');
    const firstValue = document.querySelector('#variationForm .values .value input[first]');
    const variationsInfo = document.querySelector('.variations .variationsInfo');
    const buttonOfconcluded = document.querySelector('#buttonOfconcluded');

    const inputDatasheet = document.querySelector('input#datasheet');
    const datasheetTable = document.querySelector('.datasheet table tbody');


    function createElement(tag, attributesObject) {
        const element = document.createElement(tag);

        for (attribute in attributesObject)
            element.setAttribute(attribute, attributesObject[attribute]);

        return element;
    }

    //// IMAGES
    // Add image
    inputAddImage.addEventListener('change', (event) => {
        const { files } = event.target;

        let filesInArray = Array.from(files);

        if (!filesInArray.length) return;

        filesInArray.forEach(file => {
            try {
                if(imagesBase64[file.name])
                    throw '';

                let fileReader = new FileReader();

                fileReader.readAsDataURL(file);

                fileReader.onload = function() {
                    const { result } = fileReader;

                    imagesBase64[file.name] = result;

                    let img = createElement('img', {
                        src: result,
                    });

                    let label = createElement('label', {
                        class: 'img',
                        "data-key_name": file.name
                    });

                    let divImgs = document.querySelector('.addImgs .imgs');

                    label.appendChild(img);
                    label.addEventListener('click', removeImage);

                    divImgs.appendChild(label);
                }
            } catch(e) {}
        });
    });

    function removeImage({ target, path }) {
        // If you click on the label or the image, the label is used
        let label = (target.children[0]) ? path[0] : path[1];

        const { key_name } = label.dataset;

        if (imagesBase64[key_name])
            delete imagesBase64[key_name];

        label.remove();
    }


    //// VARIATIONS
    function createValueVariation(inputValue = '') {
        const imgClose = createElement('img', {
            src: '/images/icons/close.svg',
            alt: 'close'
        });

        const buttonRemove = createElement('button', {
            type: 'button',
            class: 'buttonOfRemove'
        });

        const input = createElement('input', {
            type: 'text',
            class: 'inputText',
            placeholder: 'Valor da categoria'
        });

        const div = createElement('div', {
            class: 'value'
        });

        buttonRemove.appendChild(imgClose);
        buttonRemove.addEventListener('click', ({ path }) => {
            path[2].remove();
        });

        input.value = inputValue;

        div.appendChild(input);
        div.appendChild(buttonRemove);

        return div;
    }

    // Add new value in div of create variation
    document.querySelector('#buttonOfAddNewValue').addEventListener('click', () => {
        if (variationFormValues.children.length >= 10)
            return alert('Só pode no máximo 10 variações');

        const div = createValueVariation()

        variationFormValues.appendChild(div);
    });

    function resetVariationDiv() {
        document.querySelector('#variationForm').reset();

        const variationValues = document.querySelectorAll('.divOfCreateNewVariation .values .value');

        variationValues.forEach((value, index) => (index != 0) ? value.remove() : null);

        buttonOfconcluded.dataset.key_of_alteration = "null";
    }

    function changeVariation({ target, path }) {
        const { key } = target.dataset;

        // path[1]: div with class called variationInfo
        const variationChildrens = {
            p: path[1].children[0].innerText,
            divValues: path[1].children[1],
        };

        const variationValues = [...variationChildrens.divValues.children];

        buttonOfconcluded.dataset.key_of_alteration = key;
        variationName.value = variationChildrens.p;
        firstValue.value = variationValues[0].innerText;

        variationValues.forEach((variation, index) => {
            if(index == 0) return;

            const div = createValueVariation(variation.innerText);

            variationFormValues.appendChild(div);
        });

        createVariationInDiv.checked = true;
    }

    function AddNewVariation(){
        try {
            const notice = 'Preencha todos os campos';

            if(!variationName.value) throw new Error(notice);

            const button = createElement('button', {
                class: 'buttonOfChangeWithImgSvg',
                type: 'button'
            });

            const variationInfo = createElement('div', {
                class: 'variationInfo'
            });

            const divValues = createElement('div', {
                class: 'values'
            });

            const pName = createElement('p');
            const variationValues = document.querySelectorAll('.divOfCreateNewVariation .values .value');

            const key = variationsInfo.children.length + 1

            button.dataset.key = key;
            button.addEventListener('click', changeVariation);

            pName.innerText = variationName.value;

            variationInfo.dataset.key = key;
            variationInfo.appendChild(pName);

            variationValues.forEach((valueDiv, index) => {
                const { value } = valueDiv.children[0];

                if(!value) throw new Error(notice);

                const pValue = createElement('p', {
                    class: 'variationValue'
                });

                pValue.innerText = value;

                // if more than one, remove the p tag, otherwise remove the div
                pValue.addEventListener('click', ({target, path}) => {
                    if(path[1].children.length > 1)
                        return target.remove();

                    path[2].remove();
                });

                divValues.appendChild(pValue);
            });

            variationInfo.appendChild(divValues);
            variationInfo.appendChild(button);

            variationsInfo.appendChild(variationInfo);
            createVariationInDiv.checked = false;

            resetVariationDiv();
        } catch(error) {
            alert(error);
        }
    }

    // Add or change data to div of variations
    buttonOfconcluded.addEventListener('click', event => {
        const { key_of_alteration } = event.target.dataset;

        if(key_of_alteration !== 'null')
            document.querySelector(`.variationInfo[data-key='${key_of_alteration}']`).remove();

        AddNewVariation();
    });

    // Remove div of create variation
    document.querySelector('.buttonOfRemoveDiv').addEventListener('click', () => resetVariationDiv());

    function getDatasOfVariation() {
        let variations = [...variationsInfo.children];

        variations = variations.map(variationInfo => {
            let info = [...variationInfo.children];
            info.pop();

            let values = [...info[1].children]

            values = values.map(value => value.innerText)

            let infoObject = {
                name: info[0].innerText,
                values
            }

            return infoObject;
        });

        return variations;
    }

    //// DATASHEET

    function autosize(){
        var el = this;
        setTimeout(
            function(){
                el.style.cssText = '-moz-box-sizing:content-box';
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
            }, 0);
    }

    function createNewLineInTable() {
        const button = createElement('button', {
            type: 'button'
        });

        const textarea = {
            class: 'inputOfTable',
            type: 'text',
            rows:'1'
        };

        const textareaName = createElement('textarea', textarea);
        const textareaDescription = createElement('textarea', textarea);

        textareaName.addEventListener('keydown', autosize);
        textareaDescription.addEventListener('keydown', autosize);

        const tdName = createElement('td');
        const tdDescription = createElement('td');
        const tdButton = createElement('td');

        const tr = createElement('tr');

        button.addEventListener('click', removeLineInTable)

        textareaName.setAttribute('placeholder', 'Nome');
        textareaDescription.setAttribute('placeholder', 'Descrição');

        tdName.appendChild(textareaName);
        tdDescription.appendChild(textareaDescription);
        tdButton.appendChild(button);

        tr.appendChild(tdName);
        tr.appendChild(tdDescription);
        tr.appendChild(tdButton);

        datasheetTable.appendChild(tr);
    }

    function getDatasOfDatasheet() {
        let datasheetArray = [...datasheetTable.children];

        datasheetArray = datasheetArray.map(tr => {
            let trArray = [...tr.children];

            trObject = {
                name: trArray[0].children[0].value,
                description: trArray[1].children[0].value
            }

            if(!trObject.name || !trObject.description)
                return null;

            return trObject;
        });

        datasheetArray = datasheetArray.filter(data => data != null);

        return datasheetArray;
    }

    // Create new line in table
    document.querySelector('.buttonNewLine').addEventListener('click', createNewLineInTable);

    function removeLineInTable({ path }) {
        // path[3] is the tag tbody
        // path[2] is the tag tr
        if(path[3].children.length <= 5)
            return alert('Obrigatório no mínimo 5 linhas na ficha técnica');
        path[2].remove();
    }

    for(i = 1; i <= 5; i++) {
        createNewLineInTable();
    }

    //// SUBMIT
    document.getElementById('form').onsubmit = async function(event) {
        event.preventDefault();

        const datasheetData = getDatasOfDatasheet();

        if(datasheetData.length < 5)
            return alert('Obrigatório preencher no mínimo 5 linhas na ficha técnica');

        const variations = getDatasOfVariation();

        inputImages.value = JSON.stringify(imagesBase64);
        inputVariations.value = JSON.stringify(variations);
        inputDatasheet.value = JSON.stringify(datasheetData);

        this.submit();
    }
</script>
@endsection
