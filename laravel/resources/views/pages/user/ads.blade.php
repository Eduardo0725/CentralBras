@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/ads.css') }}">
@endsection

@section('content')
    <div id="box">
        <div class="titleAndOptions">
            <h1>Anúncios</h1>

            <div class="optionsAdsAndFilter">
                <a class="buttonAds buttonDefault buttonBlue" href="{{ route('myaccount.ads.create') }}">Anúnciar</a>

                <button class="buttonDefault buttonRed">Filtrar</button>

                <div class="barOfOrder">
                    <p>Ordenar por:</p>

                    <select name="barOfOrder" id="barOfOrder">
                        <option value="recent">Mais Recentes</option>
                        <option value="old">Mais Antigos</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="ads">
            @foreach ($data as $item)
                <div class="ad boxDefault shadow" data-key="{{ $item['id'] }}">
                    <div class="info">
                        <div class="imgProduct">
                            <img src="{{ $item['image'] ? env('APP_STORAGE') . $item['image'] : asset('images/image.svg') }}"
                                alt="Produto">

                            <a href="{{ route('product', $item['id']) }}">{{ $item['name'] }}</a>
                        </div>

                        <div class="priceAndAmount">
                            <p>R$ {{ number_format($item['cost'], 2, ',', '.') }}</p>
                            <p>{{ $item['amount'] }} unidades</p>
                        </div>

                        <div class="freteAndSalesAmount">
                            {{-- <p>Frete: Correios</p> --}}
                            <p>Vendas: 0</p>
                        </div>

                        {{-- <div class="buttonsOfOptions">
                            <button class="button buttonDefault buttonBlue" data-button="variations">Variações</button>
                            <button class="button buttonDefault buttonBlue" data-button="description">Descrição</button>
                            <button class="button buttonDefault buttonBlue">Mídia</button>
                            <button class="button buttonDefault buttonBlue">Comentários</button>
                        </div> --}}
                    </div>

                    <div class="optionsOfDetails">
                        <img tabindex="1" class="addOptionsBox" src="{{ asset('images/icons/three-dots-vertical.svg') }}"
                            alt="Opções">

                        <input class="none" type="radio" name="optionsBox">

                        <div class="optionsBox">
                            <div>
                                <a href="{{ route('product', ['product' => $item['id']]) }}">Detalhes</a>
                                <a>Editar</a>
                                <a>Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <input class="none" type="checkbox" name="inputBoxDetails" id="inputBoxDetails">

    <div class="boxDetails">
        <div class="details boxDefault">
            <div class="titleAndClose">
                <h1>Informações</h1>

                <label for="inputBoxDetails"></label>
            </div>

            <div class="detail"></div>
        </div>
    </div>

    <script exclude>
        var products = {};

        (@json($data)).forEach(data => {
            products[data.id] = data
        });

        setTimeout(() => document.querySelector('script[exclude]') && document.querySelector('script[exclude]').remove(),
            500);

    </script>

    <script>
        const titleDetail = document.querySelector('.boxDetails .titleAndClose h1');
        const divDetail = document.querySelector('.boxDetails .detail');
        const inputBoxDetails = document.querySelector('#inputBoxDetails');

        inputBoxDetails.addEventListener('change', event => {
            if (!event.target.checked){
                divDetail.innerHTML = '';
                titleDetail.innerHTML = '';
            }
        });

        function variations(variations = []) {
            if(!variations.length)
                return alert('Não tem nenhuma variação.');

            let div = createElement('div', {
                class: 'variations'
            });

            variations.forEach(variation => {
                let name = createElement('p', {
                    class: 'variationName'
                }, variation.name);

                let divValues = createElement('div', {
                    class: 'values'
                });

                variation.values.forEach(value => {
                    let variationValue = createElement('p', {
                        class: 'variationValue'
                    }, value);

                    divValues.appendChild(variationValue);
                });

                div.appendChild(name);
                div.appendChild(divValues);
            });

            divDetail.appendChild(div);

            titleDetail.innerHTML = 'Variações';

            inputBoxDetails.checked = true;
        }

        function datasheet(datasheet = []) {
            if(!datasheet.length)
                return alert('Não tem nenhuma ficha técnica.');

            let table = createElement('table');
            let tbody = createElement('tbody');

            datasheet.forEach(data => {
                let tr = createElement('tr');

                let tdName = createElement('td');
                let tdDescriptions = createElement('td');

                let name = createElement('textarea', {}, data.name);
                let descriptions = createElement('textarea', {}, data.description);

                tdName.appendChild(name);
                tdDescriptions.appendChild(descriptions);

                tr.appendChild(tdName);
                tr.appendChild(tdDescriptions);

                tbody.appendChild(tr);
            });

            table.appendChild(tbody);
            divDetail.appendChild(table);

            titleDetail.innerHTML = 'Ficha técnica';

            inputBoxDetails.checked = true;
        }

        document.querySelectorAll('.ad').forEach(ad => ad.addEventListener('click', function(event) {
            let product = products[this.dataset.key];

            if (!product) return;

            switch (event.target.dataset.button) {
                case 'variations':
                    variations(product.variations);
                    break;

                case 'datasheet':
                    datasheet(product.datasheet);
                    break;
            }
        }));

    </script>
@endsection
