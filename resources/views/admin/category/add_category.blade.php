@extends('admin.master')
@section('page_title', 'Add Category')
@section('category_select', 'active')

@section('content')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    
    <div class="content-wrapper">
        <div class="card-title d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Add New Category</h5>
            <a class="btn btn-warning back-btn" href="{{ route('admin.category') }}">
                <i class="fas fa-backward me-1"></i> Go Back
            </a>
        </div>

        <div class="add-form card p-4 shadow-sm">
            <form action="{{ route('admin.add.category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h5 class="mb-4 text-center text-muted">Category Information</h5>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="category_name" class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input id="category_name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="e.g., Electronics">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="category_slug" class="form-label fw-bold">Category Slug <span class="text-danger">*</span></label>
                        <input id="category_slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required placeholder="e.g., electronics">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="editor1" class="form-label fw-bold">Category Details</label>
                        <textarea id="editor1" name="details" class="form-control @error('details') is-invalid @enderror" rows="5">{{ old('details') }}</textarea>
                        @error('details')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4 align-items-center">
                    <div class="col-md-4 text-center mb-3 mb-md-0">
                        <div class="image-preview-wrapper border rounded p-2 bg-light d-inline-block">
                            <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Preview" class="img-fluid" style="max-height: 150px; object-fit: contain;">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="image" class="form-label fw-bold">Category Image</label>
                        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                        <div class="form-text text-muted">Recommended sizes: 800x800px. Formats: JPG, PNG, WEBP.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="fas fa-save me-1"></i> Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    CKEDITOR.replace('editor1', {
        height: 300,
        baseFloatZIndex: 10005,
        removeButtons: 'PasteFromWord'
    });

    // Auto-generate Slug from Name
    document.getElementById('category_name').addEventListener('input', function() {
        let slug = this.value.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Remove invalid chars
            .replace(/\s+/g, '-')         // Replace spaces with -
            .replace(/-+/g, '-');         // Remove duplicate dashes
        document.getElementById('category_slug').value = slug;
    });

    // Image Preview Function
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            const imagePreview = document.getElementById('imagePreview');
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection