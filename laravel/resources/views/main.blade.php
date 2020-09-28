@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('content')

    @include('components.carousel', [
        'valueVariable' => rand(),
        'title' => 'Mais vendidos',
        'contents' => $contents
    ])

    @include('components.carousel', [
        'valueVariable' => rand(),
        'title' => 'Celulares',
        'contents' => $contents
    ])

    @section('scripts')
        <script src="{{ asset('js/carousel.js') }}"></script>
    @endsection

@endsection
