@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
<div class="row">
    <div class="col-2">
        @include('admin.sidebar')
    </div>
    <div class="col-10">
        <div style="display: flex;justify-content:space-between">
            <h1 style="text-align: center">Product</h1>
            <button class="add-btn"><a href="{{ route('admin/manage-product') }}">Add Product</a></button>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Quantity</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->details }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td></td>
                        <td></td>
                        <!-- <td><img src="/product/{{ $product->image }}" alt="{{ $product->name }}" class="product_image"></td>
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
                        </td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <table class="table">
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
            </table> -->
    </div>
</div>
@endsection