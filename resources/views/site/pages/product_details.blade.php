@extends('site.pages.master')
@section('content')
    <section id="product_deatils">
        <div class="container">
            <div class="breadcrumb-section pt-4 py-4">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="product_image_section">
                        <a href="{{ route('product.details', $product->id) }}"><img src="/product/{{ $product->image }}"
                                alt="product_deatils_main_img" id="mainImage" class="product_deatils_main_img"></a>
                    </div>
                    <div class="row mt-4">
                        <div class="owl-carousel owl-theme">
                            {{-- @foreach ($product as $product) --}}
                                <div class="item">
                                    {{-- <img src="/thumbnail/1728364689.jpg" --}}
                                    <img src="/product/{{ $product->thumbnail }}" alt="product_deatils_main_img"
                                        class="product_deatils_main_img" onclick="changeImage('/thumbnail/1728364689.jpg')">
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text" style="text-align: justify;">{{ $product->details }}</p>
                        @if ($product->price > 0)
                            <p class="card-text">Tk. <del>{{ $product->price }}</del></p>
                        @endif
                        <p class="card-text">Tk. {{ $product->discount_price }}</p>
                        <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                            @csrf
                            <button class="add-btn">ADD TO CART</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="related-products">
                <h3 class="text-center pb-2"><strong>Related Products</strong></h3>
                <div class="owl-carousel owl-theme">
                    @foreach ($related_products as $product)
                        <div class="item">
                            <a href="{{ route('product.details', $product->id) }}"><img
                                    src="/product/{{ $product->image }}" alt="product_image" class="product_image"></a>
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <!-- <p class="card-text">{{ $product->details }}</p> -->
                            @if ($product->price > 0)
                                <p class="card-text">Tk. <del>{{ $product->price }}</del></p>
                            @endif
                            <p class="card-text">Tk. {{ $product->discount_price }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        function changeImage(image) {
            // Get the main image element
            const mainImage = document.getElementById("mainImage");

            // Change the src attribute of the main image
            mainImage.src = image;
        }
    </script>
@endsection
