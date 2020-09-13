<div class="carousel" id="{{ 'id' . $valueVariable }}">

    <h2>{{$title}}</h2>

    <input type="radio" name="radio{{ 'id' . $valueVariable }}" id="radio{{$valueVariable + 1}}" class="carosel_radio radio1" checked>
    @for ($i = 2; $i <= 4; $i++)
        <input type="radio" name="radio{{ 'id' . $valueVariable }}" id="radio{{$valueVariable + $i}}" class="carosel_radio radio{{$i}}">
    @endfor

    <div class="controls {{ 'id' . $valueVariable }}">
    @for ($i = 1; $i <= 4; $i++)
        <label for="radio{{$valueVariable + $i}}"></label>
    @endfor
    </div>

    <div class="cards {{ 'id' . $valueVariable }}">
        <span class="contents">

        @foreach ($contents as $content)
            <div class="card">
                <img src="{{ $content['imgMainSrc'] }}" alt="{{ $content['description'] }}" width="200px">
                <p>{{$content['description']}}</p>
                <div>
                    <p class="interest">{{ $content['interest'] }}</p>
                    <p class="discount">{{ $content['discount'] }}</p>
                </div>
                <div>
                    <p class="cost">{{ $content['cost'] }}</p>
                    <span class="stars">
                        <img src="{{ asset(App\Utils\CalcStars::calc($content['stars'], 0.5)) }}" alt="star1">
                        <img src="{{ asset(App\Utils\CalcStars::calc($content['stars'], 1.5)) }}" alt="star2">
                        <img src="{{ asset(App\Utils\CalcStars::calc($content['stars'], 2.5)) }}" alt="star3">
                        <img src="{{ asset(App\Utils\CalcStars::calc($content['stars'], 3.5)) }}" alt="star4">
                        <img src="{{ asset(App\Utils\CalcStars::calc($content['stars'], 4.5)) }}" alt="star5">
                    </span>
                </div>
            </div>
        @endforeach

        </span>
    </div>
</div>

<input type="hidden" value="{{ 'id' . $valueVariable }}">
<script id="{{ 'id' . $valueVariable }}">
    startCarousel(document.querySelector('input[type="hidden"]').value)
</script>
