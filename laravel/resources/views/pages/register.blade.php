@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <form class="box boxDefault flexColumn" action="{{ route('createAccount') }}" method="post">
        @csrf

        <h1>Cadastro</h1>

        <div class="flexRow">
            <input class="inputText" type="text" placeholder="Nome">
            <input class="inputText" type="password" placeholder="Sobrenome">
        </div>

        <div class="flexRow">
            <input class="inputText" type="text" placeholder="CPF">
            <input class="inputText" type="password" placeholder="Telefone">
        </div>

        <input class="inputText" type="password" placeholder="Email">
        <input class="inputText" type="password" placeholder="Senha">
        <input class="inputText" type="password" placeholder="Repetir senha">

        <button class="buttonDefault buttonGreen" type="submit">Criar conta</button>
        <a class="buttonDefault google" href="{{ route('createAccountWithGoogle') }}">Cadastre-se com o Google</a>
    </form>
@endsection
