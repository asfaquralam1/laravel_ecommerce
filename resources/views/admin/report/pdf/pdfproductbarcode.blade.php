<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Barcode - {{ config('app.name') }}</title>
    <style>
        .barcode_section {
            width: 530px;
            min-height: 500px;
            /* display: flex;
            flex-direction: column; */
            overflow: auto;
        }

        .single_barcode {
            padding: 9px 5px;
            text-align: center;
            float: left;
            width: 120px;
            height: 72px;
        }

        .single_barcode h4 {
            margin: 0;
            padding: 2px;
            font-size: 10px;
            border: 2px solid black;
        }

        .single_barcode span {
            letter-spacing: 2px;
            display: block !important;
            font-weight: 500;
            margin: 0px;
            margin-top: -2px;
            padding: 2px 0px;
            font-size: 10px;
        }

        .single_barcode p {
            margin: 0;
            text-transform: capitalize;
            margin-top: -5px !important;
            padding: 2px 0px;
            font-size: 10px;
        }

        .single_barcode h5 {
            margin: 0;
            padding: 2px 0px;
            font-size: 10px;
        }

        .clear_div {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="barcode_section">
        @php
            $flag = 0;
        @endphp

        @foreach ($productsWithQuantity as $ingredient)
            @for ($i = 1; $i <= $ingredient['printquantity']; $i++)
                @php
                    $flag++; // Increment the counter with each iteration
                @endphp
                <div class="single_barcode">
                    @php
                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                    @endphp
                    <h5>{{ config('app.name') }}</h5>
                    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($ingredient['product']->barcode, $generatorPNG::TYPE_CODE_128)) }}"
                        style="width: 100% !important">
                    <span>{{ $ingredient['product']->barcode }}</span>
                    <p>{{ $ingredient['product']->name }}</p>
                    <h4>Tk. {{ $ingredient['product']->price }}</h4>
                </div>
                @if ($flag % 5 == 0 && $i != 0)
                    <div class="clear_div"></div>
                @endif
            @endfor
        @endforeach
    </div>

</body>

</html>
