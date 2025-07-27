@extends('admin.master')
{{-- @section('page_title', 'Add Product')
@section('product_select', 'active') --}}
@section('content')
    <div class="layout-wrapper">
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <div class="container d-flex justify-content-between align-items-center mb-4">
                <h5>Create Product</h5>
                <a class="btn btn-warning" href="{{ route('admin.product') }}">
                    <i class="fas fa-backward"></i> Go Back
                </a>
            </div>

            <div class="container">
                <div class="card p-4 shadow-sm rounded-3">
                    <form action="{{ route('admin.add.product') }}" method="post" enctype="multipart/form-data">
                        <h3 class="mb-4 border-bottom">Product Information</h3>
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                    @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category_id" class="form-select" required>
                                        <option value="">Add Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <input id="details" name="details" type="text" class="form-control" required>
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
                                    <input id="price" name="price" type="number" step="0.01" class="form-control"
                                        required>
                                    @error('price')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="discount_price" class="form-label">Discount Price</label>
                                    <input id="discount_price" name="discount_price" type="number" step="0.01"
                                        class="form-control">
                                    @error('discount_price')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Stock Quantity</label>
                                    <input id="quantity" name="quantity" type="number" class="form-control" required>
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
                                    <input id="barcode" name="barcode" type="text" class="form-control" required>
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

                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="product_description" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="product_description" name="product_description" rows="6"
                                        placeholder="Enter detailed product description..."></textarea>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-3">
                                <div class="avatar-edit mb-4" id="imageContainer">
                                    <h6 class="mb-3">Product Image</h6>
                                    <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Default Image"
                                        class="input_image">
                                    <label for="mainImage" id="editIcon"><i class="fas fa-pencil-alt"></i></label>
                                    <input id="mainImage" name="image" type="file" accept="image/*"
                                        style="display: none;">
                                    @error('image')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="input-field">
                                    <h6 class="mb-3">Additional Images</h6>
                                    <div id="input-images"></div>
                                    <small class="form-text text-muted">
                                        <i class="las la-info-circle"></i> You can only upload a maximum of 4 images
                                    </small>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="avatar-edit mb-4" id="imageContainer">
                            <h6 class="mb-3">Product Image</h6>
                            <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Default Image"
                                class="input_image">
                            <label for="mainImage" id="editIcon"><i class="fas fa-pencil-alt"></i></label>
                            <input id="mainImage" name="image" type="file" accept="image/*"
                                style="display: none;">
                            @error('image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-field">
                            <h6 class="mb-3">Additional Images</h6>
                            <div id="input-images"></div>
                            <small class="form-text text-muted">
                                <i class="las la-info-circle"></i> You can only upload a maximum of 4 images
                            </small>
                        </div> --}}

                        <button type="submit" class="btn btn-success mt-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal (Bootstrap 5 Compatible) -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content position-relative">
                <button type="button" class="btn-close position-absolute end-0 m-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-body text-center">
                    {{-- <i class="las la-times-circle f-size--100 text--danger mb-3"></i> --}}
                    <h3 class="text--danger mb-3">@lang('Error: Cannot process your entry!')</h3>
                    <p class="mb-3">@lang('You can\'t add more than 5 images')</p>
                    <button type="button" class="btn btn--danger" data-bs-dismiss="modal">@lang('Continue')</button>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
    <script src="{{ asset('js/image-uploader.min.js') }}"></script>

    <script>
        (function($) {
            let preloaded = [];
            @if (isset($images))
                preloaded = @json($images);
            @endif

            $('#input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'thumbs',
                preloadedInputName: 'old',
                maxFiles: 5
            });

            const imageUpload = document.getElementById('mainImage');
            const previewImage = document.getElementById('imagePreview');
            const editIcon = document.getElementById('editIcon');

            if (previewImage && imageUpload) previewImage.addEventListener('click', () => imageUpload.click());
            if (editIcon && imageUpload) editIcon.addEventListener('click', () => imageUpload.click());

            if (imageUpload && previewImage) {
                imageUpload.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = e => previewImage.src = e.target.result;
                        reader.readAsDataURL(file);
                    }
                });
            }

            window.generateBarcode = function() {
                let barcode = Date.now() + Math.floor(Math.random() * 90 + 10);
                document.getElementById('barcode').value = barcode;
            };
        })(jQuery);
    </script>
@endsection
