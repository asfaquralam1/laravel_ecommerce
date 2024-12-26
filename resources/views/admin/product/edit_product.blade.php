@extends('admin.master')
@section('page_title', 'Edit product')
@section('category_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5>Edit product</h5>
            <a class="btn-warning back-btn" href="{{ route('admin.product') }}"><i class="fas fa-backward"></i> Go
                Back</a>
        </div>
        <div class="table_area">
            <h5 class="mb-4">Product Information</h5>
            <form class="admin_form" action="{{ route('admin.update.product', $product->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="mt-4 mb-4 row">
                    <div class="col-md-2">
                        <label for="name" class="control-label mb-1">Product Name</label>
                    </div>
                    <div class="col-md-10">
                        <input id="name" name="name" value="{{ $product->name }}" type="text"
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
                        <input id="details" name="details" value="{{ $product->details }}" type="text"
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
                        <input id="price" name="price" value="{{ $product->price }}" type="text"
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
                        <input id="discount_price" name="discount_price" value="{{ $product->discount_price }}"
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
                        <input id="quantity" name="quantity" value="{{ $product->quantity }}" type="text"
                            class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('quantity')
                    <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="avatar-edit">
                    <h6 class="mb-4">Product Image</h6>
                    <img  id="imagePreview" src="/product/{{ $product->image }}" alt="{{ $product->name }}" class="input_image">
                    <div>
                        <label for="image"><i class="fas fa-pencil-alt"></i></label>
                        <input id="image" name="image" type="file" style="visibility: hidden;">
                    </div>
                    @error('image')
                    <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        // Get the file selected by the user
        const file = event.target.files[0];

        // Check if the file is an image
        if (file && file.type.startsWith('image')) {
            const reader = new FileReader();

            // When the file is read successfully, update the image preview
            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result; // Set the preview source to the image data
                imagePreview.style.display = 'block'; // Show the image preview
            };

            // Read the image file as a data URL
            reader.readAsDataURL(file);
        } else {
            alert('Please select a valid image file.');
        }
    });
</script>
@endsection