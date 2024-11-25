@extends('admin.master')
@section('page_title', 'Add Product')
@section('product_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5 style=" margin-left: 20px;">Create product</h5>
            <a class="btn-warning back-btn" href="{{ route('admin.product') }}"><i class="fas fa-backward"></i> Go
                Back</a>
        </div>
        <div class="add-form">
            <form action="{{ route('admin.add.product') }}" method="post" enctype="multipart/form-data">
                <h5 class="mb-4">Product Information</h5>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="control-label mb-1">Product Name</label>
                            <input id="name" name="name" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('name')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category" class="control-label mb-1">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Add Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="details" class="control-label mb-1">Product Details</label>
                            <input id="details" name="details" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('details')
                            <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                        <label for="price" class="control-label mb-1">Product Price</label>
                        <input id="price" name="price" type="text"
                            class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('price')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="discount_price" class="control-label mb-1">Product Discount
                                Price</label>
                            <input id="discount_price" name="discount_price"
                                type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('discount_price')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="quantity" class="control-label mb-1">Product Stock Quantity</label>
                            Price</label>
                            <input id="quantity" name="quantity" type="text"
                                class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('discount_price')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
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
                <button type="submit" class="btn btn-success mt-3">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
@endsection