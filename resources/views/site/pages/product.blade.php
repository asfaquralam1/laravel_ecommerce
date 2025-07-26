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
                        <form method="GET" action="#">
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

                            {{-- Price From --}}
                            <div class="mb-3">
                                <label for="price_from" class="form-label">Price From</label>
                                <input type="number" name="price_from" class="form-control" value="{{ request('price_from') }}">
                            </div>

                            {{-- Price To --}}
                            <div class="mb-3">
                                <label for="price_to" class="form-label">Price To</label>
                                <input type="number" name="price_to" class="form-control" value="{{ request('price_to') }}">
                            </div>

                            {{-- Filter Button --}}
                            <button type="submit" class="btn btn-primary w-100">Apply Filter</button>
                        </form>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="col-md-9">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card h-100">
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
