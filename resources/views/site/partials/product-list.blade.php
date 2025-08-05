{{-- @extends('layouts.app') --}}
@extends('site.pages.master')
@section('content')
<h4 style="text-align: center">Search Results for "{{ $query }}"</h3>
    @if ($products->count())
    <div class="container">
        <div class="row">
            @forelse($products as $product)
            <div class="col-md-3 col-lg-3 col-sm-12 mb-4">
                <div class="product-card h-100">
                    <div class="image-wrapper position-relative">
                        <a href="{{ route('product.details', $product->id) }}">
                            <img src="/product/{{ $product->image }}" alt="product_image" class="product_image">
                        </a>
                        <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                            @csrf
                            <button class="add-btn">Add to cart</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-price">
                            @if ($product->discount_price > 0)
                            <del style="color: #999;">Tk. {{ $product->price }}</del>
                            <span style="color: red; margin-left: 8px;">Tk. {{ $product->discount_price }}</span>
                            @else
                            Tk. {{ $product->price }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <h3 style="text-align: center;padding-top:40px;">No products avialable at the moment</h3>
            @endforelse
        </div>
    </div>
    @else
    <div class="container py-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-md-4">
                <img src="/image/search_not_found.svg" alt="Not Found" class="img-fluid" style="max-width: 80%;">
            </div>
            <div class="col-md-6">
                <h3 class="mt-4">Nothing Found</h3>
                <p class="text-muted">Your search for <strong>"{{ $query }}"</strong> did not match any
                    products.</p>
                <a href="{{ route('home') }}" class="back-btn mt-3">Go Back Home</a>
            </div>
        </div>
    </div>
    @endif
    @endsection