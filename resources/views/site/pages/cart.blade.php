@extends('site.pages.master')
@section('content')
    <section id="cart-page">
        <div class="container">
            <table id="cart-table" class="table table-hover table-condensed">
                <thead>
                    <tr style="background-color: orange;">
                        <th style="width:50%; padding: 20px;">Product</th>
                        <th style="width:10%; padding: 20px;">Price</th>
                        <th style="width:8%; padding: 20px;">Quantity</th>
                        <th style="width:22%; padding: 20px;" class="text-center">Subtotal</th>
                        <th style="width:22%; padding: 20px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="/product/{{ $details['image'] }}"
                                                width="100" height="100" class="img-responsive" /></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ $details['price'] }}</td>
                                <td data-th="Quantity">checkout
                                    <input type="number" min="1" value="{{ $details['quantity'] }}"
                                        class="form-control quantity update-cart" />
                                </td>
                                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}
                                </td>
                                <td class="actions" class="text-center">
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-end">
                            <h3><strong>Total ${{ $total }}</strong></h3>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="5" class="text-end">
                            <a href="{{ url('/') }}" class="btn btn-warning text-end"><i class="fa fa-angle-left"></i>
                                Continue
                                Shopping</a>
                            <a href="{{ url('/checkout') }}" class="btn btn-success text-end">Checkout</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection

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
