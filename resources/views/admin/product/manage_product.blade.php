@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('admin.sidebar')
            </div>
            <div class="col-10">
                <div style="display: flex;justify-content:space-between">
                    <h1 style="text-align: center">Product</h1>
                    <button class="add-btn"><a href="{{ route('admin/manage-product') }}">Add Product</a></button>
                </div>
                <table id="example" class="table table-bordered table-striped table-light" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="color: white !important;text-align:center;">Name</th>
                            <th style="color: white !important; text-align:center;">Category</th>
                            <th style="color: white !important; text-align:center;">Details</th>
                            <th style="color: white !important; text-align:center;">Price</th>
                            <th style="color: white !important; text-align:center;">Discount Price</th>
                            <th style="color: white !important; text-align:center;">Quantity</th>
                            <th style="color: white !important; text-align:center;">image</th>
                            <th style="color: white !important; text-align:center;">action</th>
                            <th style="color: white !important; text-align:center;">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->name }}</td>
                                <td class="text-center">{{ $product->category }}</td>
                                <td class="text-center">{{ $product->details }}</td>
                                <td class="text-center">{{ $product->price }}</td>
                                <td class="text-center">{{ $product->discount_price }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td class="text-center"><img src="/product/{{ $product->image }}" alt="{{ $product->name }}"
                                        class="product_image"></td>
                                <td>
                                    <button class="edit-btn">
                                        <a href="{{ route('admin/edit-product', $product->id) }}"><i
                                                class="fas fa-edit"></i>
                                        </a></button>
                                </td>
                                <td>
                                    <p>a</p>
                                    <!-- <button class="delete-btn">
                                        <form action="{{ route('admin/destory-product', $product->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <i class="fas fa-trash"></i>
                                        </form>
                                    </button> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
