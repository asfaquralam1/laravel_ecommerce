@extends('site.pages.master')
@section('content')
    <section id="cart-page">
        <div class="breadcrumb-section pt-4 py-4">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product') }}">Products</a></li>
                    <li>My Cart</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <table id="cart-table">
                <thead>
                    <tr style="background-color: #1C305C;">
                        <th style="width: 25%" class="table_header">Product</th>
                        <th style="width: 25%" class="table_header">Variant</th>
                        <th style="width: 8%" class="table_header">Price</th>
                        <th style="width: 10%" class="table_header">Quantity</th>
                        <th style="width: 16%" class="table_header">Subtotal</th>
                        <th style="width: 16%" class="table_header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php
                                $price = isset($details['discount_price']) && $details['discount_price'] > 0
                                        ? $details['discount_price']
                                        : $details['price'];
                                $total += $price * $details['quantity'];
                            @endphp
                            <tr data-id="{{ $id }}" style="border-bottom: 1px solid #e5e5e5">
                                <td data-th="Product">
                                    <a href="{{ route('product.details', $id) }}" class="cart-item">
                                        <img src="/product/{{ $details['image'] }}" class="cart-image"/>
                                        <h6>{{ $details['name'] }}</h6>
                                    </a>
                                </td>
                                <td class="text-center">Size</td>
                                <td data-th="Price" class="text-center">Tk. {{ $price }}</td>
                                <td data-th="Quantity">
                                    <input type="number" min="1" value="{{ $details['quantity'] }}"
                                        class="form-control quantity update-cart text-center" />
                                </td>
                                <td data-th="Subtotal" class="text-center">Tk.
                                    {{ $price * $details['quantity'] }}
                                </td>
                                <td class="actions text-center">
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-end" style="background: #f8f8f8;padding: 20px;">
                            <h5>Subtotal : Tk.{{ number_format($total, 2) }}</h5>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="checkout_area">
                <a href="{{ url('/') }}" class="shopping_btn"><i class="fa fa-angle-left"></i>
                    Continue
                    Shopping</a>
                <a href="{{ url('/checkout') }}" class="checkout_btn">Checkout <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".update-cart").change(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: "{{ route('update.cart') }}",
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $(".remove-from-cart").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: "{{ route('remove.from.cart') }}",
                        method: "DELETE",
                        data: {
                            id: ele.parents("tr").attr("data-id"),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
