@extends('admin.master')
@section('page_title', 'Edit product')
@section('category_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.sidebar')
        </div>
        <div class="col-10">
            <div class="row m-t-30">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit product</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin/update-product', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Product Name</label>
                                    <input id="name" name="name" value="{{ $product->name }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('name')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category" class="control-label mb-1">Category</label>
                                    <select name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="details" class="control-label mb-1">Product Details</label>
                                    <input id="details" name="details" value="{{ $product->details }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('details')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Product Price</label>
                                    <input id="price" name="price" value="{{ $product->price }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('price')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_price" class="control-label mb-1">Product Discount Price</label>
                                    <input id="discount_price" name="discount_price" value="{{ $product->discount_price }}"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('discount_price')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="control-label mb-1">Product Stock Quantity</label>
                                    <input id="quantity" name="quantity" value="{{ $product->quantity }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('quantity')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Product image</label>
                                    <input id="image" name="image" type="file">
                                    <img src="/product/{{ $product->image }}" alt="{{ $product->name }}"
                                      width="70px" height="70px">
                                    @error('image')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Update
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
