@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')

    <div id="box" class="boxDefault">
        <div id="main">
            <div id="mainImg">
                <div>
                    @forelse ($images as $image)
                        <input class="none" type="radio" name="radioImg" id="radioImg{{ $image->id }}"
                            {{ !$loop->index ? 'checked' : '' }}>
                        <img src="{{ env('APP_STORAGE') . $image->path }}" alt="product">
                    @empty
                        <img class="notImg"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxHV_dPPk2Bp8xzVW93wOPaL4iCj3J-4KNUQ&usqp=CAU"
                            alt="product">
                    @endforelse

                    <div>
                        <div class="favoriteAndShare">
                            <a class="productIcon shareImg"></a>
                            @auth
                                <a class="productIcon {{ $favorite ? 'heartEnabled' : 'heartDisabled' }}"></a>
                            @endauth
                        </div>
                    </div>
                </div>

                <div id="carouselImgs">
                    @if ($images)
                        @foreach ($images as $image)
                            <label for="radioImg{{ $image->id }}">
                                <img src="{{ env('APP_STORAGE') . $image->path }}" alt="product" width="25px">
                            </label>
                        @endforeach
                    @endif
                </div>
            </div>

            <form class="infoProduct" action="{{ route('shoppingCart.store', ['idProduct' => $product->id]) }}"
                method="POST">
                @csrf

                <input type="hidden" id="idProduct" name="idProduct" value="{{ $product->id }}">

                <div>
                    <p class="name">{{ $product->name }}</p>
                    <div class="codeStarsAndRantings">
                        <p>Cód.{{ $product->universalCode }}</p>
                        <div>
                            <x-stars numberOfStars="3.5" />
                            <p>(550)</p>
                        </div>
                    </div>
                </div>

                <div class="price">
                    @if ($product->discount)
                        <div>
                            <div>
                                <p class="priceOld">de R$ {{ number_format($product->cost, 2, ',', '.') }}</p>
                                <p class="discount">{{ $product->discount }} OFF</p>
                            </div>

                            <p>por:
                                <b class="priceMain">
                                    R$ {{ number_format($product->cost - $product->discount, 2, ',', '.') }}
                                </b>
                            </p>
                        </div>
                        {{-- <p>ou até 12x de R$ 124,99 sem juros</p> --}}
                    @else
                        <b class="priceMain">R$ {{ number_format($product->cost, 2, ',', '.') }}</b>
                        {{-- <p>ou até 12x de R$ 124,99 sem juros</p> --}}
                    @endif
                </div>

                <div class="categories">
                    @foreach ($variations as $variation)
                        <div class="category">
                            <p>{{ $variation->name }}:</p>

                            <select name="{{ $variation->id }}">
                                @foreach ($variation->values as $variationValue)
                                    <option value="{{ $variationValue->id }}">
                                        {{ $variationValue->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>

                <div class="buttons">
                    <button type="submit" class="buttonProduct buttonDefault buttonRed">Comprar</button>
                </div>
            </form>
        </div>

        <hr>

        <div class="description">
            <p>Descrição</p>
            <p>{{ $product->description }}</p>
        </div>

        <div class="characteristics">
            <p>Características</p>

            <table>
                @if ($product->universalCode)
                    <tr>
                        <td>Código Universal</td>
                        <td>{{ $product->universalCode }}</td>
                    </tr>
                @endif

                @if ($product->brand)
                    <tr>
                        <td>Marca</td>
                        <td>{{ $product->brand }}</td>
                    </tr>
                @endif

                @if ($product->model)
                    <tr>
                        <td>Modelo</td>
                        <td>{{ $product->model }}</td>
                    </tr>
                @endif

                @foreach ($datasheet as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="evaluation">
            <p>Avaliações</p>
            <div>
                <div>
                    <p>3.5</p>
                    <div>
                        <x-stars numberOfStars="3.5" />
                    </div>
                    <p class="countOfRantings">(550)</p>
                </div>
                <p>70% dos clientes recomendam este produto</p>
                <a class="buttonDefault buttonRed" href="{{ route('product.comment', ['product' => $product->id]) }}">Avaliar</a>
            </div>

            @for ($i = 0; $i < 3; $i++) {{-- foreach --}}
                <div class="customerRating">
                    <x-stars numberOfStars="5" />

                    <p>Muito bom! Valeu a pena!</p>
                    <p>Muito bom!!adorei, muito top. Parabéns.</p>
                    <p>- Fulando</p>
                </div>
            @endfor

            <a>Ver mais avaliações</a>
        </div>
    </div>

    <x-carousel title="Mais vendidos" />
@endsection

@section('scripts')
    <script src="{{ asset('js/product.js') }}"></script>
@endsection
