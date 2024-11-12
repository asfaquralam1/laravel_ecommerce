@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <div class="row">
        <div class="col-md-2">
            @include('admin.partials.sidebar')
        </div>
        <div class="col-md-10">
            @include('admin.partials.header')
            <div style="padding: 20px !important;">
                <div class="card-title">
                    <h5>All Product</h5>
                    <a class="btn-success add-btn" href="{{ route('admin.manage.product') }}"><i class="fas fa-plus"></i> Add
                        New</a>
                </div>
                <div class="info_card">
                    <table id="table"> 
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="tr">
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td><img src="/product/{{ $product->image }}"
                                            alt="{{ $product->name }}" class="product_tumb"></td>
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
    </div>
@endsection
