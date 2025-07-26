{{-- @extends('layouts.app') --}}
@extends('site.pages.master')
@section('content')
    <h4 style="text-align: center">Search Results for "{{ $query }}"</h3>
        @if ($products->count())
            <div class="container">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <div class="card">
                                <a href="{{ route('product.details', $product->id) }}"><img
                                        src="/product/{{ $product->image }}" alt="product_image" class="product_image"></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    @if ($product->discount_price != 0)
                                        <p class="card-text" style="text-align: justify;">Tk.
                                            <del>{{ $product->price }}</del> {{ $product->discount_price }}
                                        </p>
                                    @elseif ($product->discount_price == 0)
                                        <p class="card-text" style="text-align: justify;">Tk. {{ $product->price }}</p>
                                    @endif
                                    <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                                        @csrf
                                        <button class="add-btn">ADD TO CART </button>
                                    </form>
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
