<div class="productRow">
    <div>
        <img src="{{ $imageSrc }}" alt="image">

        <div class="infoProduct">
            <div class="productRowInfo">
                <p>{{ $name }}</p>

                @isset($variations)
                    @foreach ($variations as $variation)
                        <p>{{ $variation->name }}: {{ $variation->value }}</p>
                    @endforeach
                @endisset

                @if ($amount)
                    <p>{{ $product->amountSelected }} quantidade</p>
                @endif
            </div>

            @if ($links)
                <div class="productRowLinks">
                    <a class="productRowLink">Mais produtos do vendedor</a>
                    <a href="{{ route('product', ['product' => $productId]) }}" class="productRowLink">
                        Visualizar produto
                    </a>

                    @if ($type === 'favorite' || $type === 'shoppingCart')
                        <form class="formAsLink" action="{{ $route['delete'] }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <button class="productRowLink" type="submit">Excluir</button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>

    @if ($qtd)
        <div class="amount">
            <x-box-of-numbers />

            <p>{{ $productAmount }} disponíveis</p>
        </div>
    @endif

    <p>R$ {{ number_format($price, 2, ',', '.') }}</p>
</div>
