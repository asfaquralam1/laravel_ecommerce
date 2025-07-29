@extends('site.pages.master')
@section('content')
<section id="products-page">
    {{-- <div class="breadcrumb-section pt-4 py-4">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>{{ $category_name }}</li>
            </ul>
        </div>
    </div> --}}
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
</section>
@endsection