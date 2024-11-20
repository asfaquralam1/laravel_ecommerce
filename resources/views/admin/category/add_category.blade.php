@extends('admin.master')
@section('page_title', 'Add Category')
@section('category_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5 style=" margin-left: 20px;">Add Category</h5>
            <a class="btn-warning back-btn" href="{{ route('admin.category') }}"><i class="fas fa-backward"></i> Go
                Back</a>
        </div>
        <div class="add-form">
            <form action="{{ route('admin.add.category') }}" method="post"
                enctype="multipart/form-data">
                <h5 class="mb-4">Category Information</h5>
                @csrf
                <div class="mt-4 mb-4 row">
                    <div class="col-md-2">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                    </div>
                    <div class="col-md-10">
                        <input id="category_name" name="name" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('name')
                    <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4 row">
                    <div class="col-md-2">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                    </div>
                    <div class="col-md-10">
                        <input id="category_slug" name="slug" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>
                        @error('slug')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @error('slug')
                    <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="avatar-edit">
                        <h6 class="mb-4">Product Image</h6>
                        <img src="/product/{{ $product->image }}" alt="{{ $product->name }}" class="input_image">
                <div>
                    <label for="image"><i class="fas fa-pencil-alt"></i></label>
                    <input id="image" name="image" type="file" style="visibility: hidden;">
                </div>
                @error('image')
                <div class="text-center text-danger">{{ $message }}</div>
                @enderror
        </div> --}}
        <button type="submit" class="btn btn-success mt-3">
            Save
        </button>
        </form>
    </div>
</div>
</div>
@endsection