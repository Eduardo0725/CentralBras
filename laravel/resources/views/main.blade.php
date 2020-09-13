@extends('layout.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('content')
<script>
    async function startCarousel(value) {
        let valueVariable = value;
        document.querySelector(`input[type="hidden"][value=${valueVariable}]`).remove();

        let docs = document.querySelectorAll(`div#${valueVariable} input`);

        function format(thisDocs, start, num = 0) {
            let data = '';
            thisDocs.forEach((doc, index, array) => {
                let id = doc.getAttribute('id');
                if(index !== start - 1)
                data += `#${id}:checked ~ div.controls.${valueVariable} label:nth-child(${index + num})${(index < array.length -1) ? ',' : ''}`
            });
            return data;
        }

        function format2(thisDocs, num, start = 0) {
            let left = start;
            let data = '';
            docs.forEach((doc, index, array) => {
                let id = doc.getAttribute('id');
                left += num;
                data += `#${id}:checked ~ .cards.${valueVariable} .contents { left: ${left - num}px; }`
            });
            return data;
        }

        document.querySelector('head').innerHTML += `
            <style>
                ${
                    format(docs, 0, 2)
                } {
                    display: block;
                    float: right;
                    background-image: url('https://image.flaticon.com/icons/svg/130/130884.svg');
                }

                ${
                    format(docs, 1)
                } {
                    display: block;
                    float: left;
                    background-image: url('https://image.flaticon.com/icons/svg/130/130882.svg');
                }

                ${
                    format2(docs, -1040)
                }
            </style>
        `;
        document.querySelector(`script#${valueVariable}`).remove();
    }
</script>

@include('components.carousel', [
    'valueVariable' => rand(),
    'title' => 'Mais vendidos',
    'contents' => [
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card
    ]
])

@include('components.carousel', [
    'valueVariable' => rand(),
    'title' => 'Mais vendidos',
    'contents' => [
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card,
        $card
    ]
])

@endsection
