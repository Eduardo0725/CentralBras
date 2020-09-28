<div class="card">
    <img src="{{ $content['imgMainSrc'] }}" alt="{{ $content['description'] }}" width="200px">
    <p>{{ $content['description'] }}</p>
    <div>
        <p class="interest">{{ $content['interest'] }}</p>
        <p class="discount">{{ $content['discount'] }}</p>
    </div>
    <div>
        <p class="cost">{{ $content['cost'] }}</p>
        <span class="stars">
            @for ($star = 1; $star <= 5; $star++)
                <img src="{{ asset(App\Utils\Utils::calcStars($content['stars'], $star - 0.5)) }}" alt="star{{ $star }}">
            @endfor
        </span>
    </div>
</div>
