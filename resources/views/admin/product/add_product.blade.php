@extends('admin.master')
@section('page_title', 'Add Product')
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
        <div class="row m-t-30">
            <div class="col-md-12">
                <div class="admin_body">
                    <h4>Create Product</h4>
                    <div class="admin_input_card">
                        <form action="{{ route('admin/add-product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="control-label mb-1">Product Name</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                @error('name')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="category" class="control-label mb-1">Category</label><br>
                                <select name="category" id="">
                                    <option value="">Add Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="details" class="control-label mb-1">Product Details</label>
                                <input id="details" name="details" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                @error('details')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="price" class="control-label mb-1">Product Price</label>
                                <input id="price" name="price" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                @error('price')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="discount_price" class="control-label mb-1">Product Discount Price</label>
                                <input id="discount_price" name="discount_price" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                @error('discount_price')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="quantity" class="control-label mb-1">Product Stock Quantity</label>
                                <input id="quantity" name="quantity" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                @error('quantity')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="image" class="control-label mb-1">Product image</label>
                                <input id="image" name="image" type="file">
                                @error('image')
                                <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
