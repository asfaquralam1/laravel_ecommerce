<div class="row">
    @foreach ($products as $product)
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <a href="{{ route('product.details', $product->id) }}"><img src="/product/{{ $product->image }}"
                        alt="..." class="product_image"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <!-- <p class="card-text" style="text-align: justify;">{{ $product->details }}</p> -->
                    <p class="card-text" style="text-align: justify;">Tk. {{ $product->price }}</p>
                    <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                        @csrf
                        <button class="add-btn">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
