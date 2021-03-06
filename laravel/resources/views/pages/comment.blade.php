@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('content')
    <form id="box" class="boxDefault" action="{{ route('product.comment', ['product' => $product->id]) }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $product->id }}">

        <h1>{{ $product->name }}</h1>

        <div class="commentInfo">
            <img src="{{ env('APP_STORAGE') . $product->midia->path }}" alt="image">

            <div class="info">
                <div class="divStars">
                    <p>Quantas estrelas você daria?</p>

                    <div class="commentStars">
                        <input class="none" type="radio" name="stars" id="star5" value="5">
                        <label for="star5"></label>

                        <input class="none" type="radio" name="stars" id="star4" value="4">
                        <label for="star4"></label>

                        <input class="none" type="radio" name="stars" id="star3" value="3">
                        <label for="star3"></label>

                        <input class="none" type="radio" name="stars" id="star2" value="2">
                        <label for="star2"></label>

                        <input class="none" type="radio" name="stars" id="star1" value="1">
                        <label for="star1"></label>
                    </div>
                </div>

                <div class="comment">
                    <p>Conte-nos mais sobre o produto.</p>
                    <textarea cols="30" rows="10" name="comment" placeholder="Escreva características, materiais, cor..."></textarea>
                </div>

                <div class="title">
                    <p>Em uma frase, resuma a sua opinião (opcional).</p>
                    <input class="inputText" type="text" name="commentTitle" placeholder="Dê um título a sua opinião">
                </div>
            </div>
        </div>

        <div class="commentButtons">
            <button type="submit" class="buttonDefault buttonGreen">Enviar opinião</button>
        </div>
    </form>
@endsection
