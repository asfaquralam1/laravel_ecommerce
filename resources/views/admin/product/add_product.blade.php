@extends('admin.master')
@section('page_title', 'Add Product')
@section('product_select', 'active')
@section('container')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Add Product</h3>
                    </div>
                    <hr>
                    <form action="{{ route('admin/add-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Product Name</label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required>
                            @error('name')
                                <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Category</label>
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
                        <div class="form-group">
                            <label for="details" class="control-label mb-1">Product Details</label>
                            <input id="details" name="details" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required>
                            @error('details')
                                <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label mb-1">Product Price</label>
                            <input id="price" name="price" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required>
                            @error('price')
                                <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
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
@endsection
