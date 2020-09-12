@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('content')
@include('components.carousel', [
    'valueVariable' => rand(),
    'title' => 'Mais vendidos',
    'contents' => [
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card
    ]
])

@include('components.carousel', [
    'valueVariable' => rand(),
    'title' => 'Mais vendidos',
    'contents' => [
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card
    ]
])

@endsection
