@extends('master')
@section('content')
    <div class="container">
        <h1 style="text-align: center">Products</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    <div class="card">
                        <img src="/product/{{ $product->image }}" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text" style="text-align: justify;">{{ $product->details }}</p>
                            @if ($product->discount_price > 0)
                                <p class="card-text" style="text-align: justify;">Tk. {{ $product->discount_price }}</p>
                                <p class="card-text" style="text-align: justify;">Tk. <del>{{ $product->price }}</del></p>
                            @elseif ($product->discount_price == 0)
                                <p class="card-text" style="text-align: justify;">Tk. {{ $product->price }}</p>
                            @endif
                            <a href="{{ route('product_details', $product->id) }}" class="btn btn-primary">View</a>
                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                                @csrf
                                <button> <i class="fas fa-shopping-basket"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
