<a class="card" href="{{ route('product', ['product' => $id]) }}">
    <img src="{{ $midia }}" alt="image" width="200px">
    <p>{{ $name }}</p>
    <div>
        <p class="interest">{{ $interest }}</p>
        <p class="discount">{{ $discount }}</p>
    </div>
    <div>
        <p class="cost">R$ {{ $price }}</p>

        <x-stars numberOfStars="3.5" />
    </div>
</a>
