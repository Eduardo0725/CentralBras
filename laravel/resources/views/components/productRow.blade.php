<div class="productRow flexRow">
    <div class="flexRow">
        <img src="{{ $product['imgs'][0] }}" alt="">

        <div class="infoProduct flexColumn">
            <div class="flexColumn">
                <p>{{ $product['description'] }}</p>

                @foreach ($product['categories'] as $key => $category)
                    <p>{{ $key }}: {{ $category }}</p>
                @endforeach

                @if ($amount ?? false)
                    <p>{{ $product['amountSelected'] }} quantidade</p>
                @endif
            </div>

            @if ($links ?? true)
                <div class="flexRow">
                    <a href="">Mais produtos do vendedor</a>
                    <a href="">Comprar agora</a>
                    @if ($addCart ?? false)
                        <a href="">Adicionar ao carrinho</a>
                    @endif
                    <a href="">Excluir</a>
                </div>
            @endif
        </div>
    </div>

    @if($qtd ?? false)
    <div class="amount flexColumn">
        @include('components.boxOfNumbers', ['inputValue' => $product['amountSelected']])

        <p>{{ $product['amountAvailable'] }} disponíveis</p>
    </div>
    @endif

    <p>R$ {{ number_format($product['cost'], 2, ',', '.') }}</p>
</div>
