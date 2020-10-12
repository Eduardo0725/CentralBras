@extends('layout.base')

@section('styles')
    <style>
        #content {
            width: 400px;
            align-items: center;
            justify-content: center
        }

        .box {
            position: relative;
            top: -2px;
            left: -2px;
            box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.3);
            padding: 40px
        }

        .box h1 {
            margin: 0 0 20px;
        }

        .box p {
            font-size: 1.4rem
        }
    </style>
@endsection

@section('content')
    <div class="box boxDefault">
        <h1>Verificação de Email</h1>
        <p>Verifique no seu email se recebeu a notificação de confirmação e clique no link.</p>
    </div>
@endsection

@section('scripts')
    <script>
        setTimeout(()=>{
            let url = window.location.origin;
            window.location.replace(url + '/account/login');
        }, 5000);
    </script>
@endsection
