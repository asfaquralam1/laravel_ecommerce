@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <h1>Product</h1>
    <button><a href="{{ route('admin/manage-product') }}">Add Product</a></button>

    <div class="row">
        @foreach ($products as $product)
            <p>Name : {{ $product->name }}</p>
            <p>Category: {{ $product->category }}</p>
            <p>Details: {{ $product->details }}</p>
            <p>Price: {{ $product->price }}</p>
            <p>Discount Price: {{ $product->discount_price }}</p>
            <img src="/product/{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%">
            <a href="{{ route('admin/edit-product', $product->id) }}"><button>Edit</button></a>
            <form action="{{ route('admin/destory-product', $product->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button>Delete</button>
            </form>
        @endforeach
    </div>
@endsection
