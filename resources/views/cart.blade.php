@extends('master')
@section('content')
<div class="container">
    <div class="cart">
        <table style="width: 100%;border: 1px solid black">
            <tr style="background-color: yellow; padding: 100px;">
                <th>Product</th>
                <th>Variant</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_title }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <button class="btn-decrease updateCartItem" data-id="{{ $product->id }}" data-qty="{{$product->quantity}}">-</button>
                    <input type="text" name="quantity" id="quantity_{{ $product->id }}" value="{{ $product->quantity }}" style="width:50px; text-align: center">
                    <button class="btn-increase updateCartItem" data-id="{{ $product->id }}" data-qty="{{$product->quantity}}">+</button>
                </td>
                <td>{{ $product->quantity * $product->price }}</td>
                <td>
                    <form action="{{ route('cart.delete', $product->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="delete-btn"> <i class="fas fa-trash"></i></button>
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
    // $(document).ready(function() {
    //     $('.btn-increase').on('click', function() {
    //         var id = $(this).data('id');
    //         console.log("increaseQuantity", id)
    //         increaseQuantity(id);
    //     });

    //     $('.btn-decrease').on('click', function() {
    //         var id = $(this).data('id');
    //         console.log("decreaseQuantity", id)
    //         decreaseQuantity(id);
    //     });

    //     function increaseQuantity(id) {
    //         $.ajax({
    //             url: "{{ route('cart.increase') }}",
    //             type: "POST",
    //             data: {
    //                 id: id,
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(response) {
    //                 $('#quantity_' + id).val(response.quantity);
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error(xhr.responseText);
    //             }
    //         });
    //     }

    //     function decreaseQuantity(id) {
    //         $.ajax({
    //             url: "{{ route('cart.decrease') }}",
    //             type: "POST",
    //             data: {
    //                 id: id,
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(response) {
    //                 $('#quantity_' + id).val(response.quantity);
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error(xhr.responseText);
    //             }
    //         });
    //     }
    // });

    $(document).on('click', '.updateCartItem', function() {
        if ($(this).hasClass('btn-increase')) {
            var quantity = $(this).data('qty');
            new_qty = parseInt(quantity) + 1;
        }
        if ($(this).hasClass('btn-decrease')) {
            var quantity = $(this).data('qty');
            if(quantity<=1){
                alert("Item quantity must be 1 or greater");
                return false;
            }
            new_qty = parseInt(quantity) - 1;
        }
        var cartid = $(this).data('id');
        $.ajax({
            data:{id: cartid, qty: new_qty},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/update-cart-qty",
            type: 'post',
            success:function(resp){
                alert(resp)
            },error:function(){
                alert("Error");
            }
        })
    })
</script>