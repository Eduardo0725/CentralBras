<div class="boxOfNumbers">
    <p>{{ $pName ?? '' }}</p>
    <div>
        <a href=""><img src="{{ asset('images/icons/subtract.svg') }}" alt=""></a>
        <input type="number" name="{{ $inputName ?? '' }}" value="1">
        <a href=""><img src="{{ asset('images/icons/sum.svg') }}" alt=""></a>
    </div>
</div>
