@php
    $user = false;
@endphp

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

        @yield('styles')

        <title>{{ config('app.name') }} @yield('titulo')</title>
    </head>
    <body>
        <header>
            <a class="headerMenu">
                <img src="{{ asset('images/icons/menu.svg') }}" alt="Menu">
                Menu
            </a>
            <a href="{{ route('main') }}" class="headerLogo">
                <img src="{{ asset('images/logo.svg') }}" alt="CentralBrás">
            </a>
            <form action="{{ route('page') }}" class="headerSearch">
                <input type="text" name="search">
                <button type="submit" class="headerBtn" href="#">
                    <img src="{{ asset('images/icons/search.svg') }}" alt="Search">
                </button>
            </form>
            <div class="headerButtons">
                @if ($user)
                    <a class="headerBtn heart" href="{{ route('cartAndFavorites', ['cartOrFavorite' => true]) }}">
                        <img src="{{ asset('images/icons/heart-outline.svg') }}" alt="Heart Outline">
                    </a>
                @endif
                <a class="headerBtn cart" href="{{ route('cartAndFavorites', ['cartOrFavorite' => false]) }}">
                    <img src="{{ asset('images/icons/cart.svg') }}" alt="Cart">
                </a>
                <a class="headerBtn user" href="{{ ($user) ? '' : route('login') }}">
                    <img src="{{ asset('images/icons/user.svg') }}" alt="User">
                    @if (!$user)
                        <p>Entre ou cadastre-se</p>
                    @endif
                </a>
            </div>
            <menu>
                <a href="{{ route('page', ['search' => 'Celulares e Telefones']) }}">Celulares e Telefones</a>
                <a href="{{ route('page', ['search' => 'Informática']) }}">Informática</a>
                <a href="{{ route('page', ['search' => 'TV e Eletrônicos']) }}">TV e Eletrônicos</a>
                <a href="{{ route('page', ['search' => 'Eletrodomésticos']) }}">Eletrodomésticos</a>
                <a href="{{ route('page', ['search' => 'Eletroportáteis']) }}">Eletroportáteis</a>
                <a href="{{ route('page', ['search' => 'Moda e Decoração']) }}">Moda e Decoração</a>
                <a href="{{ route('page', ['search' => 'Esporte e Lazer']) }}">Esporte e Lazer</a>
                <a href="{{ route('page', ['search' => 'Games']) }}">Games</a>
                <a href="{{ route('page', ['search' => 'Outros']) }}">Outros</a>
            </menu>
        </header>

        <nav>
            <a href="{{ route('page', ['search' => 'Celulares']) }}">Celulares</a>
            <a href="{{ route('page', ['search' => 'Notebook']) }}">Notebook</a>
            <a href="{{ route('page', ['search' => 'TV e home theater']) }}">TV e home theater</a>
            <a href="{{ route('page', ['search' => 'Móveis e decoração']) }}">Móveis e decoração</a>
            <a href="{{ route('page', ['search' => 'Eletrodomésticos']) }}">Eletrodomésticos</a>
            <a href="{{ route('page', ['search' => 'Beleza e perfumaria']) }}">Beleza e perfumaria</a>
        </nav>

        <div id="content">
            @yield('content')
        </div>

        <footer><p>Copyright © 2020 - CentralBrás - Todos os direitos reservados</p></footer>

        <script src="{{ asset('js/global.js') }}"></script>
        @yield('scripts')
    </body>
</html>
