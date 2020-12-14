@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/createAddressOfAd.css') }}">
@endsection

@section('content')
    <div id="box" data-dusk="address">
        <form class="boxDefault shadow" action="{{ route('myaccount.ads.store') }}" method="POST">
            @csrf

            <h1>Selecione o endereço da venda</h1>

            <div class="addresses">
                @forelse ($addresses as $address)
                    <div class="address">
                        <p>Endereço {{ $loop->index + 1 }}</p>

                        <input class="none" type="radio" name="address" id="address{{ $address->id }}" value="{{ $address->id }}">

                        <fieldset>
                            <label for="address{{ $address->id }}">
                                <div class="title">
                                    <p>Rua {{ $address->street }}, {{ $address->houseNumber }}</p>

                                    <img src="{{ asset('images/icons/ok.svg') }}" alt="ok">
                                </div>

                                <p>{{ $address->city }} ({{ $address->cep }}), {{ $address->state }}</p>

                                @if ($address->complement)
                                    <p>{{ $address->complement }} / {{ App\Utils\Utils::formatPhoneNumber($address->phone) }}</p>
                                @endif

                                <p>{{ App\Utils\Utils::formatPhoneNumber($address->phone) }}</p>
                            </label>
                        </fieldset>
                    </div>
                @empty
                    <h3>Não há endereços cadastrados</h3>
                @endforelse
            </div>

            <div class="buttonsOfAddressesDiv">
                <label class="buttonDefault buttonBlue" for="saveAddress">Cadastre um novo endereço</label>

                <button class="buttonDefault buttonGreen" type="submit">Próximo</button>
            </div>
        </form>
    </div>

    <x-save-address />
@endsection

@section('scripts')
    <script src="{{ asset('js/createAddressOfAd.js') }}"></script>
@endsection
