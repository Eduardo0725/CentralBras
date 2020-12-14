@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <form id="box" class="boxDefault" action="{{ route('account.register') }}" method="post">
        @csrf

        <h1>Cadastro</h1>

        @if ($errors->has('errorCreate'))
            <p class="error">{{ $errors->get('errorCreate')[0] }}</p>
        @endif

        <div>
            <input class="inputText {{ $errors->has('name') ? 'inputError' : null }}" type="text" name="name"
                placeholder="{{ $errors->get('name')[0] ?? 'Nome' }}">

            <input class="inputText {{ $errors->has('surname') ? 'inputError' : null }}" type="text" name="surname"
                placeholder="{{ $errors->get('surname')[0] ?? 'Sobrenome' }}">
        </div>

        <div>
            <input class="inputText {{ $errors->has('cpf') ? 'inputError' : null }}" size="11" type="text" name="cpf"
                placeholder="{{ $errors->has('cpf') ? $errors->get('cpf')[0] : 'CPF/CNPJ' }}">

            <input class="inputText {{ $errors->has('phone') ? 'inputError' : null }}" min="10" max="11" type="text" name="phone"
                placeholder="{{ $errors->get('phone')[0] ?? 'Telefone' }}">
        </div>

        <input class="inputText {{ $errors->has('email') ? 'inputError' : null }}" type="email" name="email"
            placeholder="{{ $errors->get('email')[0] ?? 'Email' }}">

        <input class="inputText password  {{ $errors->has('password') ? 'inputError' : null }}" min="8" type="password"
            name="password" placeholder="{{ $errors->get('password')[0] ?? 'Senha' }}">

        <input class="inputText repeatPassword" min="8" type="password" placeholder="Repetir senha">

        <p class="passwordMessage error"></p>

        <button class="buttonDefault buttonGreen" type="submit">Criar conta</button>

        <a class="buttonDefault google" href="{{ route('account.google') }}">Cadastre-se com o Google</a>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
