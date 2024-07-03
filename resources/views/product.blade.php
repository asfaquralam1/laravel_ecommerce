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
                            <p class="card-text" style="text-align: justify;">Tk. {{ $product->price }}</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
