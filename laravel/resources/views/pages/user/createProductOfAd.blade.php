@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/createProductOfAd.css') }}">
@endsection

@section('content')
    <div id="box">
        <form
            id="form"
            class="boxDefault shadow"
            action="{{ route('myaccount.ads.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <h1>Informações do produto</h1>

            <div class="addImgs">
                <h2>Adicionar fotos</h2>

                <div>
                    {{-- When new images are selected, old images are removed, so a new entry has been created to store all images --}}
                    <input class="none" type="file" name="addImage" id="addImage" multiple>
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
                <input class="inputText" type="url" name="video" placeholder="Vídeo">
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
<script src="{{ asset('js/createProductOfAd.js') }}"></script>
@endsection
