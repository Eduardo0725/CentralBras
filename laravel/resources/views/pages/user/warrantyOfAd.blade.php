@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/warrantyOfAd.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    @include('components.sidebar', ['sales' => true])

    <div id="box">
        <form action="{{ route('myaccount.ads.create.finished') }}" method="post" class="boxDefault shadow" id="warrantyOfAd">
            @csrf

            <h1>Garantia</h1>

            <div class="warranty">
                <input type="radio" class="none warrantyInput" name="warranty" id="vendorWarranty" value="vendor">
                <label for="vendorWarranty">
                    <div class="titleAndInfo">
                        <p>Garantia do vendedor</p>
                        <div class="info">
                            <input class="inputText day" type="number" min="1" max="31" name="vendorDay" placeholder="Dia">
                            <input class="inputText month" type="number" min="1" max="12" name="vendorMounth" placeholder="Mês">
                            <input class="inputText year" type="number" min="1950" name="vendorYear" placeholder="Ano">
                        </div>
                    </div>
                </label>

                <input type="radio" class="none warrantyInput" name="warranty" id="manufacturerWarranty" value="manufacturer">
                <label for="manufacturerWarranty">
                    <div class="titleAndInfo">
                        <p>Garantia do fabricante</p>
                        <div class="info">
                            <input class="inputText day" type="number" min="1" max="31" name="manufacturerDay" placeholder="Dia">
                            <input class="inputText month" type="number" min="1" max="12" name="manufacturerMounth" placeholder="Mês">
                            <input class="inputText year" type="number" min="1950" name="manufacturerYear" placeholder="Ano">
                        </div>
                    </div>
                </label>

                <input type="radio" class="none warrantyInput" name="warranty" id="withoutWarranty" value="without">
                <label for="withoutWarranty">
                    <div class="titleAndInfo">
                        <p>Sem garantia</p>
                    </div>
                </label>
            </div>

            <div class="buttonSubmit">
                <button class="buttonDefault buttonGreen">Próximo</button>
            </div>
        </form>
    </div>
@endsection
