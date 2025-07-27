@extends('site.pages.master')

@section('content')
<section id="products-page">
    <div class="breadcrumb-section pt-4 py-4 mb-3">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Products</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            {{-- Sidebar Filter --}}
            <div class="col-md-3">
                <div style="max-height: 500px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 8px;">
                    <form method="GET" action="{{ route('filter') }}">
                        <h5 class="mb-3">Filter Products</h5>

                        {{-- Category Filter --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
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
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="h-100">
                            <a href="{{ route('product.details', $product->id) }}">
                                <img src="/product/{{ $product->image }}" alt="product_image" class="product_image card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                @if ($product->discount_price != 0)
                                <p class="card-text" style="text-align: justify;">
                                    Tk. <del>{{ $product->price }}</del> {{ $product->discount_price }}
                                </p>
                                @else
                                <p class="card-text" style="text-align: justify;">
                                    Tk. {{ $product->price }}
                                </p>
                                @endif
                                <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                                    @csrf
                                    <button class="add-btn">ADD TO CART</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3 style="text-align: center; padding-top: 40px;">No products available at the moment</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection