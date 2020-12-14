@php
    $num = $contents->currentPage() - 2;
    $num = $num < 1 ? 1 : $num;

    $num2 = $contents->currentPage();

    $num2 += $contents->currentPage() === 1 ? 4 : ($contents->currentPage() === 2 ? 3 : 2);

    $num2 = $num2 > $contents->lastPage() ? $contents->lastPage() : $num2;
@endphp

@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
@endsection

@section('content')
    <div id="box">
        <input class="none" type="checkbox" id="filter">

        <div class="background"></div>

        <div class="filter">
            <label for="filter">
                <img src="{{ asset("images/icons/close.svg") }}" alt="close">
            </label>

            <div>
                <div class="filterCategories">
                    <p>Categorias</p>
                    <a>Celulares e Telefones</a>
                    <a>Informática</a>
                    <a>TV e Eletrônicos</a>
                    <a>Eletrodomésticos</a>
                    <a>Eletroportáteis</a>
                    <a>Moda e Decoração</a>
                    <a>Esporte e Lazer</a>
                    <a>Games</a>
                    <a>Outros</a>
                </div>

                <div class="filterDiscountAndCondition">
                    <div class="filterDiscount">
                        <p>Descontos</p>

                        <div>
                            <input type="checkbox" name="discount20" id="discount20">
                            <label for="discount20">20%</label>

                            <input type="checkbox" name="discount40" id="discount40">
                            <label for="discount40">40%</label>

                            <input type="checkbox" name="discount60" id="discount60">
                            <label for="discount60">60%</label>

                            <input type="checkbox" name="discount80" id="discount80">
                            <label for="discount80">80%</label>

                            <input type="checkbox" name="discount100" id="discount100">
                            <label for="discount100">100%</label>
                        </div>
                    </div>

                    <div class="filterCondition">
                        <p>Condição</p>

                        <div>
                            <input type="checkbox" name="used" id="used">
                            <label for="used">Usado</label>

                            <input type="checkbox" name="new" id="new">
                            <label for="new">Novo</label>
                        </div>
                    </div>
                </div>

                <div class="filterCost">
                    <p>Valor</p>

                    <div>
                        <label for="min">Valor mínimo</label>
                        <input type="number" name="min" id="min" min="0">

                        <label for="max">Valor máximo</label>
                        <input type="number" name="max" id="max" min="0">
                    </div>
                </div>

                <div class="filterEvaluation">
                    <p>Avaliação</p>

                    <div>
                        @for ($stars = 1; $stars <= 5; $stars++)
                            <input type="checkbox" name="star{{ $stars }}" id="star{{ $stars }}" value="{{ $stars }}">

                            <label for="star{{ $stars }}">
                                <x-stars numberOfStars="{{ $stars }}" />
                            </label>
                        @endfor
                    </div>
                </div>
            </div>

            <span class="ready">
                <label class="buttonDefault buttonBlue" for="filter">Concluído</label>
            </span>
        </div>

        <div class="features">
            <p>Pesquisa: {{$search}}</p>

            <div class="filterAndOrderBy">
                <label class="buttonDefault buttonRed" for="filter">Filtrar</label>

                <p>Ordenar por:</p>

                <select name="orderBy" id="orderBy">
                    <option value="1">Revelância</option>
                    <option value="2">Mais vendidos</option>
                    <option value="3">Maior preço</option>
                    <option value="4">Menor preço</option>
                </select>
            </div>
        </div>

        <div class="cardsContents">
            @foreach ($contents as $content)
                <div>
                    <x-card :product="$content" />
                </div>
            @endforeach
        </div>

        <div class="pages">
            @if ($contents->currentPage() > 1)
                <a
                    href="{{ route('page', ['search' => $search, 'page' => $contents->currentPage() - 1]) }}"
                    class="imgLeft"
                ></a>
            @endif

            @for ($i = $num; $i <= $num2; $i++)
                <a
                    href="{{ route('page', ['search' => $search, 'page' => $i]) }}"
                    class={{ ($contents->currentPage() == $i)?'currentPage':'' }}
                >{{ $i }}</a>
            @endfor

            @if ($contents->currentPage() < $contents->lastPage())
                <a
                    href="{{ route('page', ['search' => $search, 'page' => $contents->currentPage() + 1]) }}"
                    class="imgRight"
                ></a>
            @endif
        </div>
    </div>

    <x-carousel title="Mais vendidos" />
@endsection

@section('scripts')
    <script src="{{ asset('js/page.js') }}"></script>
@endsection
