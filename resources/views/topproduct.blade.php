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
