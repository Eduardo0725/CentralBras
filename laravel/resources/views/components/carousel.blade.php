<div class="carousel">
    <div class="controls">
        <label class="left" data-carousel_side="left" style="visibility:hidden;"></label>
        <label class="right" data-carousel_side="right"></label>
    </div>

    <div class="carousel-div">
        <h2>{{ $title }}</h2>

        <div class="cards">
            @foreach ($contents as $content)
                <x-card :product="$content" />
            @endforeach

            <a style="width: 1px; cursor:none;"></a>
        </div>
    </div>
</div>
