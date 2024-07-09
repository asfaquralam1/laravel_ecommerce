@extends('master')
@section('content')
<div class="container">
    <div class="card">
        <table>
            <tr style="background-color: yellow; padding: 20px;">
                <th>Product</th>
                <th>Variant</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->product_title}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <button class="btn-decrease" data-id="{{ $product->id }}">-</button>
                    <input type="text" name="quantity" id="quantity_{{ $product->id }}" value="{{$product->quantity}}" style="width:50px; text-align: center">
                    <button class="btn-increase" data-id="{{ $product->id }}">+</button>
                </td>
                <td>{{$product->quantity * $product->price}}</td>
                <td>
                    <form action="{{ route('cart.delete',$product->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-increase').on('click', function() {
            var id = $(this).data('id');
            console.log("increaseQuantity",id)
            increaseQuantity(id);
        });

        $('.btn-decrease').on('click', function() {
            var id = $(this).data('id');
            console.log("decreaseQuantity",id)
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
    });
</script>
