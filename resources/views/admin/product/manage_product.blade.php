@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <h1>Product</h1>
    <button class="add-btn"><a href="{{ route('admin/manage-product') }}">Add Product</a></button>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Details</th>
            <th>Price</th>
            <th>Discount Price</th>
            <th>Quantity</th>
            <th>image</th>
            <th colspan="3">action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->details }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount_price }}</td>
                <td>{{ $product->quantity }}</td>
                <td><img src="/product/{{ $product->image }}" alt="{{ $product->name }}" class="product_image"></td>
                <td>
                    <button class="edit-btn">
                        <a href="{{ route('admin/edit-product', $product->id) }}"><i class="fas fa-edit"></i>
                        </a></button>
                </td>
                <td>
                    <button class="delete-btn">
                        <form action="{{ route('admin/destory-product', $product->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <i class="fas fa-trash"></i>
                        </form>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
