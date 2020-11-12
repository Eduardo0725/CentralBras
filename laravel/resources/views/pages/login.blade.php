@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <form class="box boxDefault flexColumn" action="{{ route('account.login') }}" method="POST">
        @csrf

        <h2>Entrar na conta</h2>

        @if ($errors->has('notFound'))
            <p class="error">{{ $errors->get('notFound')[0] }}</p>
        @endif

        <input class="inputText {{ $errors->has('email') ? 'inputError' : '' }}" type="text" name="email"
            placeholder="{{ $errors->has('email') ? $errors->get('email')[0] : 'Email' }}">

        <input class="inputText {{ $errors->has('password') ? 'inputError' : '' }}" type="password" name="password"
            placeholder="{{ $errors->has('password') ? $errors->get('password')[0] : 'Senha' }}">

        <button class="buttonDefault buttonGreen" type="submit">Entrar</button>

        <div class="flexRow">
            <hr>
            <p>Ou</p>
            <hr>
        </div>

        <a class="buttonDefault google" href="">Entre com o Google</a>
        <a href="{{ route('account.register') }}">Não tem conta? Cadastre-se!</a>
    </form>
@endsection
