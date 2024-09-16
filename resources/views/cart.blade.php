@extends('master')
@section('content')
    <section id="cart-page">
        <div class="container">
            <table id="cart" class="table table-hover table-condensed">
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
                            {{ var_dump($id) }}
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
                                <td data-th="Quantity">
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
                        <td>
                            <a href="{{ url('/') }}" class="btn btn-warning text-end"><i class="fa fa-angle-left"></i>
                                Continue
                                Shopping</a>
                        </td>
                        {{-- <td colspan="5" class="text-end">
                            <button
                                style="background-color: #65CCB7 !important;padding: 5px !important;border-radius: 5px;border: 1px solid #65CCB7">
                                <form action="{{ route('palce.order') }}" method="post"
                                    style="margin-block-end: 0 !important;">
                                    @csrf
                                    Checkout
                                </form>
                            </button>
                        </td> --}}
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-increase').on('click', function() {
            var id = $(this).data('id');
            console.log("increaseQuantity", id)
            increaseQuantity(id);
        });

        $('.btn-decrease').on('click', function() {
            var id = $(this).data('id');
            console.log("decreaseQuantity", id)
            decreaseQuantity(id);
        });

        function increaseQuantity(id) {
            $.ajax({
                url: "{{ route('cart.increase') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#quantity_' + id).val(response.quantity);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function decreaseQuantity(id) {
            $.ajax({
                url: "{{ route('cart.decrease') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#quantity_' + id).val(response.quantity);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

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
