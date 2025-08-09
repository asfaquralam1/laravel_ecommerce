{{-- @extends('layouts.app') --}}
@extends('site.pages.master')
@section('content')
    @if ($products->count())
        <div class="container">
            <h5 class="search-header">
                Search Results for "{{ $query }}"
            </h5>
            <div class="row">
                {{-- Sidebar Filter --}}
                <div class="col-md-3">
                    <div class="filter_area" style="max-height: 500px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 8px;">
                        <form method="GET" action="{{ route('filter') }}">
                            <h5 class="mb-3">Filter Products</h5>

                            {{-- Category Filter --}}
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="card p-3 mb-4"> -->
                            <h5 class="mb-3">Filter by Price</h5>

                            <div id="price-range"></div>

                            <div class="d-flex justify-content-between mt-2">
                                <span>৳<span id="min-price-show">0</span></span>
                                <span>৳<span id="max-price-show">10000</span></span>
                            </div>

                            <input type="hidden" id="min_price" name="min_price" value="{{ request('min_price', 0) }}">
                            <input type="hidden" id="max_price" name="max_price" value="{{ request('max_price', 10000) }}">

                            <button type="submit" class="btn btn-primary btn-sm mt-3 w-100">Apply Filter</button>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="col-md-9">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-md-3 col-lg-3 col-sm-12 mb-4">
                                <div class="product-card h-100">
                                    <div class="image-wrapper position-relative">
                                        <a href="{{ route('product.details', $product->id) }}">
                                            <img src="/product/{{ $product->image }}" alt="product_image"
                                                class="product_image">
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
                                                <span style="color: red; margin-left: 8px;">
                                                    Tk.{{ $product->discount_price }}
                                                </span>
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
