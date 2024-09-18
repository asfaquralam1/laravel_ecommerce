@extends('site.pages.master')
@section('content')
    <div class="container">
        <div class="card">
            <a href="{{ route('product_details', $product->id) }}"><img src="/product/{{ $product->image }}" alt="..."
                    class="product_image"></a>
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text" style="text-align: justify;">{{ $product->details }}</p>
                @if (is_null($product->discount_price))
                    <p class="card-text" style="text-align: justify;">Tk. {{ $product->discount_price }}</p>
                    <p class="card-text" style="text-align: justify;">Tk. <del>{{ $product->price }}</del></p>
                @elseif (is_null($product->price))
                    <p class="card-text" style="text-align: justify;">Tk. {{ $product->price }}</p>
                @endif
                <form action="{{ route('add_cart', $product->id) }}" method="post">
                    @csrf
                    <button class="add-btn">ADD TO CART</button>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="quantity" value="1" min="1" style="width:100px">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add to Cart">
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
