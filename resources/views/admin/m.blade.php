@extends('admin.layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')
<h1 class="mb-10">Manage Product</h1>

<a href="{{url('admin/product')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Add Product</h3>
                </div>
                <hr>
                <form action="{{ route('product.add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="product_name" class="control-label mb-1">Product Name</label>
                        <input id="product_name" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('product_name')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc" class="control-label mb-1">Short desc</label>
                        <input id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('short_desc')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="control-label mb-1">Category</label>
                        <input id="category_id" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('category_id')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="size_id" class="control-label mb-1">Size</label>
                        <input id="size_id" name="size_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('size_id')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color_id" class="control-label mb-1">Color</label>
                        <input id="color_id" name="color_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('color_id')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coupon_id" class="control-label mb-1">Coupon</label>
                        <input id="coupon_id" name="coupon_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('coupon_id')
                        <div class="text-center text-danger">{{ $message}}</div>
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
@endsection
