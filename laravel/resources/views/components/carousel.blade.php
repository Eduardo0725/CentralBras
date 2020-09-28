<div class="carousel" id="{{ 'id' . $valueVariable }}">

    <div class="controls">
        <label class="left {{ 'id' . $valueVariable }}"></label>
        <label class="right {{ 'id' . $valueVariable }}"></label>
    </div>

    <div class="carousel-div">
        <h2>{{$title}}</h2>

        <div class="cards">
            <span class="contents" number="0" style="left: 1px;">

            @foreach ($contents as $content)
                @include('components.card', ['content' => $content])
            @endforeach

            </span>
        </div>
    </div>
</div>
