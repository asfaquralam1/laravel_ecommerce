@extends('master')
@section('content')
<div class="container">
    <div class="card">
        <table>
            <tr style="background-color: yellow; padding: 20px;">
                <th>Product</th>
                <th>Varient</th>
                <th>Price</th>
                <th>quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td><button>-</button><input type="text" name="quantity" value="{{$product->quantity}}"style="width:50px; text-align: center"><button>+</button></td>
                <td>{{$product->quantity * $product->price}}</td>
                <td><a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-trash"></i>
                    </a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
<script>
    
</script>