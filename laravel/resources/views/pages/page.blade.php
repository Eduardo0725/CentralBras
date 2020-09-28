@php
    $pagesNumbersVisibles = 5;
    $num = ($pagesMax - $page < $pagesNumbersVisibles) ? $page + (($pagesMax - $page + 1) - $pagesNumbersVisibles) : $page; //acrescenta atrás
    $num2 = ($pagesMax - $page < $pagesNumbersVisibles) ? $page + (($pagesMax - $page + 1)) : $page + $pagesNumbersVisibles; //acrescenta na frente
@endphp

@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection

@section('content')


        <div class="features">
            <p>Pesquisa: {{$search}}</p>
            <div class="filterAndOrderBy">
                <label for="filter">Filtrar</label>
                <input type="checkbox" id="filter">
                <div class="background"></div>
                <div class="filter">
                    <label for="filter"><img src="{{ asset("images/icons/close.svg") }}" alt=""></label>

                    <div>
                        <div class="filterCategories">
                            <p>Categorias</p>
                            <a href="">Celulares e Telefones</a>
                            <a href="">Informática</a>
                            <a href="">TV e Eletrônicos</a>
                            <a href="">Eletrodomésticos</a>
                            <a href="">Eletroportáteis</a>
                            <a href="">Moda e Decoração</a>
                            <a href="">Esporte e Lazer</a>
                            <a href="">Games</a>
                            <a href="">Outros</a>
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
                                <input type="checkbox" name="star{{ $stars }}" id="discount100">
                                    <label for="star{{ $stars }}">
                                        @for ($star = 1; $star <= 5; $star++)
                                            <img src="{{ asset(App\Utils\Utils::calcStars($stars, $star - 0.5)) }}" alt="star{{ $star }}">
                                        @endfor
                                    </label>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <span class="ready">
                        <label for="filter">Concluído</label>
                    </span>
                </div>
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
                @include('components.card', ['content' => $content])
            @endforeach
        </div>


    <div class="pages">
        @if ($page > 1)
            <a href="{{ route('page', ['search' => $search, 'page' => $page - 1]) }}" class="imgLeft"></a>
        @endif

        @if ($page !== 1)
            <a href="{{ route('page', ['search' => $search, 'page' => 1]) }}">1</a>
            <p>...</p>
        @endif

        @for ($i = $num; $i < $num2; $i++)
            <a href="{{ route('page', ['search' => $search, 'page' => $i]) }}" class={{ ($page == $i)?'currentPage':'' }}>{{ $i }}</a>
        @endfor

        @if ($page !== $pagesMax)
            <p>...</p>
            <a href="{{ route('page', ['search' => $search, 'page' => $pagesMax]) }}">{{ $pagesMax }}</a>
        @endif

        @if ($page < $pagesMax)
            <a href="{{ route('page', ['search' => $search, 'page' => $page + 1]) }}" class="imgRight"></a>
        @endif
    </div>

    @include('components.carousel', [
        'valueVariable' => rand(),
        'title' => 'Mais vendidos',
        'contents' => $contents
    ])

    @section('scripts')
        <script src="{{ asset('js/carousel.js') }}"></script>
    @endsection

@endsection
