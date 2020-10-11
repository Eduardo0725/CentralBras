@extends('layout.base')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/boxOfNumbers.css') }}">
<link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
@endsection

@section('content')

<div id="box" class="boxDefault">

    @for ($i = 0; $i < count($product['imgs']); $i++)
    <input class="none" type="radio" name="radioImg" id="radioImg{{ $i }}" value="{{ $i }}">
    @endfor

    <div id="main">
        <div id="mainImg">
            <div>
                <img id="imgFirst" src="{{ $product['imgs'][0] }}" alt="product">
                <div>
                    <div>
                        <label href="" class="shareImg"></label>
                        <label href="" class="heartEnabled"></label>
                    </div>
                </div>
            </div>

            <div id="carouselImgs">
                @foreach ($product['imgs'] as $key => $img)
                <label for="radioImg{{ $key }}"><img src="{{ $img }}" alt="product" width="25px"></label>
                @endforeach
            </div>
        </div>
        <div>
            <div class="infoProduct">
                <p class="description">
                    Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera
                    48MP + 5MP + 16MP
                </p>
                <div class="codeStarsAndRantings">
                    <p>Cód.0000000001</p>
                    <div>
                        <div>
                            @for ($star = 1; $star <= 5; $star++) <img
                                class="star" src="{{ asset(App\Utils\Utils::calcStars(3.5, $star - 0.5)) }}" alt="star{{ $star }}">
                                @endfor
                        </div>
                        <p>(550)</p>
                    </div>
                </div>
            </div>
            <div class="costAndCategories">
                <div class="cost">
                    <div>
                        <p class="costOld">de R$ 1.699,90</p>
                        <p class="discount">20% OFF</p>
                    </div>
                    <p>por: <b>R$ 1.499,90</b></p>
                    <p>ou até 12x de R$ 124,99 sem juros</p>
                </div>

                @include('components.boxOfNumbers', ['pName' => 'Quantidade:', 'inputName' => 'qtd'])

                <div class="category"> {{-- quantidade de divs dinâmica --}}
                    <p>Cor:</p>
                    <select name="cor" id="cor">
                        <option value="azul">Azul</option>
                        <option value="vermelho">Vermelho</option>
                        <option value="preto">Preto</option>
                        <option value="branco">Branco</option>
                    </select>
                </div>
            </div>

            <div class="buttons">
                <button class="buttonDefault buttonRed">Comprar</button>
                <button class="buttonDefault">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>

    <hr>

    <div class="description">
        <p>Descrição</p>
        <p>
            Novo e moderno design com câmera tripla. Tire fotos super nítidas com o sensor da câmera principal de 48 MP
            e modo Night Vision. Grave vídeos em ultra-wide com a câmera de ação dedicada. Além disso, use o sensor de
            foco automático a laser para não perder nenhum momento e saia sempre bem nas selfies com a câmera frontal de
            25 MP.
        </p>
    </div>

    <div class="characteristics">
        <p>Características</p>
        {{-- foreach --}}
        <table>
            <tr>
                <td>Marca:</td>
                <td>Motorola</td>
            </tr>
            <tr>
                <td>Linha:</td>
                <td>Moto G</td>
            </tr>
            <tr>
                <td>Modelo:</td>
                <td>G8 Plus Dual SIM</td>
            </tr>
            <tr>
                <td>Dual SIM:</td>
                <td>Sim</td>
            </tr>
            <tr>
                <td>Memória interna:</td>
                <td>64GB</td>
            </tr>
            <tr>
                <td>Memória RAM:</td>
                <td>4GB</td>
            </tr>
        </table>
    </div>

    <div class="evaluation">
        <p>Avaliações</p>
        <div>
            <div>
                <p>3.5</p>
                <div>
                    @for ($star = 1; $star <= 5; $star++) <img
                        class="star" src="{{ asset(App\Utils\Utils::calcStars(3.5, $star - 0.5)) }}" alt="star{{ $star }}">
                        @endfor
                </div>
                <p class="countOfRantings">(550)</p>
            </div>
            <p>70% dos clientes recomendam este produto</p>
            <a class="buttonDefault buttonRed" href="{{ route('comment', ['id' => $product['id']]) }}">Avaliar</a>
        </div>

        @for ($i = 0; $i < 3; $i++) {{-- foreach --}}

        <div class="customerRating">
            <div>
                @for ($star = 1; $star <= 5; $star++) <img class="star" src="{{ asset(App\Utils\Utils::calcStars(5, $star - 0.5)) }}"
                    alt="star{{ $star }}">
                    @endfor
            </div>
            <p>Muito bom! Valeu a pena!</p>
            <p>Muito bom!!adorei, muito top. Parabéns.</p>
            <p>- Fulando</p>
        </div>

        @endfor

        <a href="">Ver mais avaliações</a>
    </div>
</div>

@include('components.carousel', [
    'valueVariable' => rand(),
    'title' => 'Mais vendidos',
    'contents' => $contents
])

<br>

@endsection

@section('scripts')
<script src="{{ asset('js/product.js') }}"></script>
<script src="{{ asset('js/boxOfNumbers.js') }}"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
@endsection
