@extends('admin.master')
@section('page_title', 'Add Product')
@section('product_select', 'active')
@section('container')
<div class="row">
    <div class="col-2">
        @include('admin.partials.sidebar')
    </div>
    <div class="col-10">
        @include('admin.partials.header')
        <div style="padding: 20px !important;">
            <div class="card-title">
                <h5>Create product</h5>
                <a class="btn-warning back-btn" href="{{ route('admin/product') }}"><i class="fas fa-backward"></i> Go
                    Back</a>
            </div>
            <div class="info_card">
                <form class="admin_form" action="{{ route('admin/add-product') }}" method="post" enctype="multipart/form-data">
                    <h5 class="mb-4">Product Information</h5>
                    @csrf
                    <div class="mt-4 mb-4 row">
                        <div class="col-md-2">
                            <label for="name" class="control-label mb-1">Product Name</label>
                        </div>
                        <div class="col-md-10">
                            <input id="name" name="name" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('name')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 row">
                        <div class="col-md-2">
                            <label for="category" class="control-label mb-1">Category</label>
                        </div>
                        <div class="col-md-10">
                            <select name="category" class="options">
                                <option value="">Add Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 row">
                        <div class="col-md-2">
                            <label for="details" class="control-label mb-1">Product Details</label>
                        </div>
                        <div class="col-md-10">
                            <input id="details" name="details" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('details')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 row">
                        <div class="col-md-2">
                            <label for="price" class="control-label mb-1">Product Price</label>
                        </div>
                        <div class="col-md-10">
                            <input id="price" name="price" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('price')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 row">
                        <div class="col-md-2">
                            <label for="discount_price" class="control-label mb-1">Product Discount
                                Price</label>
                        </div>
                        <div class="col-md-10">
                            <input id="discount_price" name="discount_price"
                                type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('discount_price')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 row">
                        <div class="col-md-2">
                            <label for="quantity" class="control-label mb-1">Product Stock Quantity</label>
                        </div>
                        <div class="col-md-10">
                            <input id="quantity" name="quantity" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('quantity')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="avatar-edit">
                        <h6 class="mb-4">Product Image</h6>
                        {{-- <img src="/product/{{ $product->image }}" alt="{{ $product->name }}" class="input_image"> --}}
                        <div>
                            <label for="image"><i class="fas fa-pencil-alt"></i></label>
                            <input id="image" name="image" type="file" style="visibility: hidden;">
                        </div>
                        @error('image')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-success mt-3">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
