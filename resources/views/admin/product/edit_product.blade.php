@extends('admin.master')
@section('page_title', 'Edit product')
@section('category_select', 'active')
@section('content')
    <div class="layout-wrapper">
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <div class="container d-flex justify-content-between align-items-center mb-4">
                <h5>Edit product</h5>
                <a class="btn-warning back-btn" href="{{ route('admin.product') }}"><i class="fas fa-backward"></i> Go
                    Back</a>
            </div>
            <div class="container">
                <div class="card p-4 shadow-sm rounded-3">
                    <h3 class="mb-4">Product Information</h3>
                    <form action="{{ route('admin.update.product', $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input id="name" name="name" value="{{ $product->name }}" type="text"
                                        class="form-control" required>
                                    @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="details" class="form-label">Product Details</label>
                                    <input id="details" name="details" value="{{ $product->details }}"
                                        value="{{ $product->details }}" type="text" class="form-control" required>
                                    @error('details')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Product Price</label>
                                    <input id="price" name="price" value="{{ $product->price }}" type="number"
                                        step="0.01" class="form-control" required>
                                    @error('price')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="discount_price" class="form-label">Discount Price</label>
                                    <input id="discount_price" name="discount_price" value="{{ $product->discount_price }}"
                                        type="number" step="0.01" class="form-control" required>
                                    @error('discount_price')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Stock Quantity</label>
                                    <input id="quantity" name="quantity" value="{{ $product->quantity }}" type="number"
                                        class="form-control" required>
                                    @error('quantity')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 align-items-end">
                            <div class="col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="barcode" class="form-label">Barcode <span
                                            class="text-danger">*</span></label>
                                    <input id="barcode" name="barcode" value="{{ $product->barcode }}" type="text"
                                        class="form-control" required>
                                    @error('barcode')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="mb-3">
                                    <button type="button" onclick="generateBarcode()" class="btn btn-success w-100 mt-4">
                                        Generate Barcode
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="product_description" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="product_description" name="product_description" value="{{ $product->details }}"
                                        rows="6" placeholder="Enter detailed product description..."></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="avatar-edit">
                                    <h6 class="mb-4">Product Image</h6>
                                    <img id="imagePreview" src="/product/{{ $product->image }}"
                                        alt="{{ $product->name }}" class="input_image">
                                    <label for="image" id="editIcon"><i class="fas fa-pencil-alt"></i></label>
                                    <input id="mainImage" name="image" type="file" style="display: none;">
                                    @error('image')
                                        <div class="text-center text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-9">
                                <!-- image gallery-->
                                <div class="input-field">
                                    <h6 class="mb-4">Additional Images</h6>
                                    <div class="input-images"></div>
                                    <small class="form-text text-muted">
                                        <i class="las la-info-circle"></i> @lang('You can only upload a maximum of 5 images')</label>
                                    </small>
                                </div>

                            <!-- Preview Container -->
                            <div id="image-preview-container"></div>
                        </div>

                        </div>
                        <button type="submit" class="btn btn-success mt-3">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
    <script src="{{ asset('js/image-uploader.min.js') }}"></script>

    <script>
        (function($) {
            let preloaded = [];

            @if (!empty($preloadedImages))
                preloaded = @json($preloadedImages); // must be array of { id: 'image1.jpg', src: '...' }
            @endif

            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'photos',
                preloadedInputName: 'old', // will submit array of `id`s (which should be filenames)
                maxFiles: 5
            });

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
        })(jQuery);
    </script>

@endsection
