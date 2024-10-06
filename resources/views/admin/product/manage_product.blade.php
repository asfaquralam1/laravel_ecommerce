@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.partials.sidebar')
        </div>
        <div class="col-10">
            <div class="header_card">
                <i class="fas fa-bars"></i>
                <p><i class="fas fa-user"></i>{{ auth()->user() ? auth()->user()->name : '' }}</p>
            </div>
            <div style="padding: 20px !important">
                <div class="row align-items-center mb-4 justify-content-between">
                    <div class="col-md-6 col-sm-6">
                        <h5>All Product</h5>
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align: right !important">
                        <a class="btn-success" style="font-size: 13px;padding: 7px 15px !important;border-radius: 5px;"
                            href="{{ route('admin/manage-product') }}"><i class="fas fa-plus"></i> Add
                            New</a>
                    </div>
                </div>
                <div class="table_card">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Details</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Discount Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">image</th>
                                <th class="text-center">action</th>
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
                                    <td class="text-center"><img src="/product/{{ $product->image }}"
                                            alt="{{ $product->name }}" class="product_tumb"></td>
                                    <td class="text-center"
                                        style="display:flex; flex-direction: row;justify-content:space-around;padding-top: 20px;">
                                        <a class="btn-warning edit-btn"
                                            href="{{ route('admin/edit-product', $product->id) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin/destory-product', $product->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
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
