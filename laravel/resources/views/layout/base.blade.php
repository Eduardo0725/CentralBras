<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
            <a id="menu">
                <img src="{{ asset('images/icons/menu.svg') }}" alt="Menu">
                Menu
            </a>
            <a href="{{ route('main') }}" id="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="CentralBrás">
            </a>
            <div id="search">
                <input type="text" name="search">
                <button href="#">
                    <img src="{{ asset('images/icons/search.svg') }}" alt="Search">
                </button>
            </div>
            <div id="buttons">
                <button href="#" id="heart">
                    <img src="{{ asset('images/icons/heart-outline.svg') }}" alt="Heart Outline">
                </button>
                <button href="#" id="cart">
                    <img src="{{ asset('images/icons/cart.svg') }}" alt="Cart">
                </button>
                <button href="#" id="user">
                    <img src="{{ asset('images/icons/user.svg') }}" alt="User">
                    {{-- <p>Entre ou cadastre-se</p> --}}
                </button>
            </div>
            <menu>
                <a href="#">Celulares e Telefones</a>
                <a href="#">Informática</a>
                <a href="#">TV e Eletrônicos</a>
                <a href="#">Eletrodomésticos</a>
                <a href="#">Eletroportáteis</a>
                <a href="#">Moda e Decoração</a>
                <a href="#">Esporte e Lazer</a>
                <a href="#">Games</a>
                <a href="#">Outros</a>
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

        @yield('scripts')
    </body>
</html>
