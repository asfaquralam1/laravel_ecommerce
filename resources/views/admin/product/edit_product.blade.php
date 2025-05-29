@extends('admin.master')
@section('page_title', 'Edit product')
@section('category_select', 'active')
@section('content')
    <div class="layout-wrapper">
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <div class="card-title">
                <h5>Edit product</h5>
                <a class="btn-warning back-btn" href="{{ route('admin.product') }}"><i class="fas fa-backward"></i> Go
                    Back</a>
            </div>
            <div class="add-form">
                <h3 class="mb-4">Product Information</h3>
                <form action="{{ route('admin.update.product', $product->id) }}" method="post" enctype="multipart/form-data">
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
                        <img id="imagePreview" src="/product/{{ $product->image }}" alt="{{ $product->name }}"
                            class="input_image">
                        <label for="image" id="editIcon"><i class="fas fa-pencil-alt"></i></label>
                        <input id="mainImage" name="image" type="file" style="display: none;">
                        @error('image')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- image gallery-->
                    <div class="input-field">
                        <h6 class="mb-4">Additional Images</h6>
                        <div class="input-images"></div>
                        <small class="form-text text-muted">
                            <i class="las la-info-circle"></i> @lang('You can only upload a maximum of 6 images')</label>
                        </small>
                    </div>

                    <!-- Preview Container -->
                    <div id="image-preview-container"></div>
                    <button type="submit" class="btn btn-success mt-3">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
    <script src="{{ asset('js/image-uploader.min.js') }}"></script>

    <script>
        (function($) {
            let preloaded = [];

            @if ($product->thumbnail)
                let stored = @json(json_decode($product->thumbnail));
                preloaded = stored.map((filename, index) => ({
                    id: index,
                    src: "{{ asset('thumbnail') }}/" + filename
                }));
            @endif

            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'photos',
                preloadedInputName: 'old',
                maxFiles: 4
            });
        })(jQuery);
    </script>

    <script>
        // Get the image, file input, and edit icon elements
        const imageUpload = document.getElementById('mainImage');
        const previewImage = document.getElementById('imagePreview');
        const editIcon = document.getElementById('editIcon');

        // Trigger file input when the image is clicked
        previewImage.addEventListener('click', function() {
            imageUpload.click();
        });

        // Trigger file input when the edit icon is clicked
        editIcon.addEventListener('click', function() {
            imageUpload.click();
        });

        // Event listener for file selection
        imageUpload.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            if (file) {
                // Create a URL for the selected file and update the image source
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Update image source with uploaded file
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script>

@endsection
