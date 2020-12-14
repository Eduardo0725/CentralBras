@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('content')
    <x-carousel title="Mais vendidos" />
    <x-carousel title="Mais vendidos" />
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
