@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <form class="box boxDefault flexColumn" action="{{ route('myaccount') }}" method="POST">
        @csrf

        <h2>Entrar na conta</h2>

        <input class="inputText" type="text" name="email" placeholder="Email">
        <input class="inputText" type="password" name="password" placeholder="Senha">

        <button class="buttonDefault buttonGreen" type="submit">Entrar</button>

        <div class="flexRow">
            <hr>
            <p>Ou</p>
            <hr>
        </div>

        <a class="buttonDefault google" href="">Entre com o Google</a>
        <a href="{{ route('register') }}">Não tem conta? Cadastre-se!</a>
    </form>
@endsection
