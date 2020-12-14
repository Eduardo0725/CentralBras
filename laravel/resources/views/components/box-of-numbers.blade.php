<div class="boxOfNumbers">
    <p>{{ $pName }}</p>

    <div>
        <a><img src="{{ asset('images/icons/subtract.svg') }}"></a>

        <input type="number" min="1" max="9999" name="{{ $inputName }}" value="{{ $inputValue }}">

        <a><img src="{{ asset('images/icons/sum.svg') }}"></a>
    </div>
</div>
