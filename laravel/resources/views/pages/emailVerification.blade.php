@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/emailVerification.css') }}">
@endsection

@section('content')
    <div class="box boxDefault">
        <h1>Verificação de Email</h1>
        <p>Verifique no seu email se recebeu a notificação de confirmação e clique no link.</p>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/emailVerification.js') }}"></script>
@endsection
