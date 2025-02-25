@extends('admin.master')
@section('page_title', 'Add Category')
@section('category_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5>Add Category</h5>
            <a class="btn-warning back-btn" href="{{ route('admin.category') }}">
                <i class="fas fa-backward"></i> Go Back
            </a>
        </div>
        <div class="add-form">
            <form action="{{ route('admin.add.category') }}" method="post" enctype="multipart/form-data">
                <h5 class="mb-4 text-center">Category Information</h5>
                @csrf
                <!-- Category Name -->
                <div class="mb-4 row">
                    <div class="col-md-2">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                    </div>
                    <div class="col-md-10">
                        <input id="category_name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Category Slug -->
                <div class="mb-4 row">
                    <div class="col-md-2">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                    </div>
                    <div class="col-md-10">
                        <input id="category_slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('slug')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Category Details (CKEditor) -->
                <div class="mb-4 row">
                    <div class="col-md-2">
                        <label for="editor1" class="control-label mb-1">Category Details</label>
                    </div>
                    <div class="col-md-10">
                        <textarea id="editor1" name="details" rows="5" cols="20"></textarea>
                        @error('details')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Category Image Upload -->
                <div class="mb-4 row">
                    <div class="col-md-2">
                        <label for="image" class="control-label mb-1">Category Image</label>
                    </div>
                    <div class="col-md-10">
                        <div class="avatar-edit">
                            <!-- Display existing image or default placeholder -->
                            @if(isset($category) && $category->image)
                                <img id="imagePreview" src="/category/{{ $category->image }}" alt="Category Image" class="input_image" style="max-width: 200px; margin-bottom: 10px;">
                            @else
                                <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Default Image" class="input_image" style="max-width: 200px; margin-bottom: 10px;">
                            @endif
                            <div>
                                <label for="image" class="btn btn-secondary">
                                    <i class="fas fa-pencil-alt"></i> Choose Image
                                </label>
                                <input id="image" name="image" type="file" style="visibility: hidden;" onchange="previewImage(event)">
                            </div>
                        </div>
                        @error('image')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn btn-success mt-3">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    CKEDITOR.replace('editor1', {
        height: 400,
        baseFloatZIndex: 10005,
        removeButtons: 'PasteFromWord'
    });

    // Image Preview Function
    function previewImage(event) {
        const reader = new FileReader();
        const imagePreview = document.getElementById('imagePreview');
        reader.onload = function() {
            if (reader.readyState === 2) {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection