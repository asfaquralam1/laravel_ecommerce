@extends('site.pages.master')
@section('content')
<section id="products-page">
    <div class="container">
        <div class="breadcrumb-section pt-4 py-4">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>{{ $category_name }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            @forelse($products as $product)
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="card">
                    <a href="{{ route('product.details', $product->id) }}"><img src="/product/{{ $product->image }}"
                            alt="product_image" class="product_image"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text" style="text-align: justify;">{{ $product->details }}</p>
                        @if ($product->discount_price > 0)
                        <p class="card-text" style="text-align: justify;">Tk. {{ $product->discount_price }}
                        </p>
                        <p class="card-text" style="text-align: justify;">Tk.
                            <del>{{ $product->price }}</del>
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
</section>
@endsection

<!-- <script>
    // When the first select (#supplier_stock_id) changes
    $("#supplier_stock_id").change(function() {
        var productId = $(this).val();

        // Ensure the productId is not null or empty
        if (productId != null && productId != "") {
            // Perform AJAX request to get product details
            $.ajax({
                url: '/admin/supplier/requisition/product/details/' + productId,
                type: 'get',
                dataType: 'JSON',
                data: {},
                success: function(data) {
                    // Update the fields based on the response
                    $('#unit').val(data.item.measurement_unit);
                    $('#total_qty').val(data.item.total_qty);
                    $('#unit_cost').val(data.item.unit_cost);

                    // Store product details globally (if needed)
                    productMeasurementUnit = data.item.measurement_unit;
                    unitCost = data.item.unit_cost;
                    productName = data.item.supplier_product_name;
                    productStock = data.item.total_qty;

                    // Optionally, you can trigger the second select change manually here if needed
                    // Update the second select value dynamically if required
                    updateBarcodeSelect(data.item.supplier_product_name); // Example of updating the second select
                }
            });
        }
    });

    // When the second select (#barcode) changes
    $("#barcode").change(function() {
        var productId = $(this).val();

        // Ensure the productId is not null or empty
        if (productId != null && productId != "") {
            // Perform AJAX request to get product details
            $.ajax({
                url: '/admin/supplier/requisition/product/details/' + productId,
                type: 'get',
                dataType: 'JSON',
                data: {},
                success: function(data) {
                    // Update the fields based on the response
                    $('#unit').val(data.item.measurement_unit);
                    $('#total_qty').val(data.item.total_qty);
                    $('#unit_cost').val(data.item.unit_cost);

                    // Store product details globally (if needed)
                    productMeasurementUnit = data.item.measurement_unit;
                    unitCost = data.item.unit_cost;
                    productName = data.item.supplier_product_name;
                    productStock = data.item.total_qty;

                    // Optionally, you can trigger the first select change manually here if needed
                    // Update the first select value dynamically if required
                    updateSupplierStockSelect(data.item.supplier_product_name); // Example of updating the first select
                }
            });
        }
    });

    // Function to update the second select dynamically (example)
    function updateBarcodeSelect(productName) {
        // You can modify this function to update the second select dynamically based on productName or other data
        // This is just an example of how you might update the second select based on AJAX response
        $("#barcode").val(productName).trigger('change'); // For example, you can set the barcode to match the product name
    }

    // Function to update the first select dynamically (example)
    function updateSupplierStockSelect(productName) {
        // You can modify this function to update the first select dynamically based on productName or other data
        // This is just an example of how you might update the first select based on AJAX response
        $("#supplier_stock_id").val(productName).trigger('change'); // For example, you can set the supplier stock ID to match the product name
    }
</script> -->