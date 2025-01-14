@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5>Products</h5>
            <div>
                <a class="btn-success add-btn" href="{{ route('admin.manage.product') }}"><i class="fas fa-plus"></i> Add
                    New</a>
                <a class="btn-primary add-btn" href="{{ route('admin.printbarcode.product') }}">Print Barcodes</a>
            </div>
        </div>
        <div class="table_area">
            <table id="table">
                <thead>
                    <tr>
                        <td class="text-center">#</td>
                        <th class="text-center">Barcode</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Discount Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $id = 1
                    @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{$id++}}</td>
                        <td class="text-center">{{ $product->barcode }}</td>
                        <td class="text-center"><img src="/product/{{ $product->image }}" alt="{{ $product->name }}" class="product_tumb">{{ $product->name }}</td>
                        <td class="text-center">{{ $product->category }}</td>
                        <td class="text-center">{{ $product->details }}</td>
                        <td class="text-center">{{ $product->price }}</td>
                        <td class="text-center">{{ $product->discount_price }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="action_icon_row">
                            <a class="btn-primary action-btn"
                                href="{{ route('admin.edit.product', $product->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.destory.product', $product->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn-danger action-btn"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection