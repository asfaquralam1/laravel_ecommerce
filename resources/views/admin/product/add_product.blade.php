@extends('admin.master')
@section('page_title', 'Add Product')
@section('product_select', 'active')
@section('content')
    <div class="layout-wrapper">
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <div class="container d-flex justify-content-between align-items-center mb-4">
                <h5>Create Product</h5>
                <a class="btn-warning back-btn" href="{{ route('admin.product') }}">
                    <i class="fas fa-backward"></i> Go Back
                </a>
            </div>
            <div class="container">
                <form action="{{ route('admin.add.product') }}" method="post" enctype="multipart/form-data">
                    <h3 class="mb-4 border-bottom">Product Information</h3>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="control-label mb-1">Product Name</label>
                                <input id="name" name="name" type="text" class="form-control" required>
                            </div>
                            @error('name')
                                <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category" class="control-label mb-1">Category</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Add Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="details" class="control-label mb-1">Product Details</label>
                                <input id="details" name="details" type="text" class="form-control" required>
                                @error('details')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price" class="control-label mb-1">Product Price</label>
                                <input id="price" name="price" type="number" step="0.01" class="form-control"
                                    required>
                                @error('price')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="discount_price" class="control-label mb-1">Product Discount Price</label>
                                <input id="discount_price" name="discount_price" type="number" step="0.01"
                                    class="form-control" required>
                                @error('discount_price')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="quantity" class="control-label mb-1">Product Stock Quantity</label>
                                <input id="quantity" name="quantity" type="number" class="form-control" required>
                                @error('quantity')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 align-items-end">
                        <div class="col-md-6 col-lg-4">
                            <div class="mb-3">
                                <label for="barcode" class="form-label">Barcode <span class="text-danger">*</span></label>
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

                    <div class="row">
                        <div class="col-mb-6 col-lg-6">
                            <div class="mb-3">
                                <label for="product_description" class="control-label mb-1">Product Description</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="6"
                                    placeholder="Enter detailed product description..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="avatar-edit mb-4" id="imageContainer">
                        <h6 class="mb-3">Product Image</h6>
                        <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Default Image"
                            class="input_image">
                        <label for="mainImage" id="editIcon"><i class="fas fa-pencil-alt"></i></label>
                        <input id="mainImage" name="image" type="file" accept="image/*" style="display: none;">
                        @error('image')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-field col-10">
                        <h6 class="mb-3">Additional Images</h6>
                        <div class="input-images"></div>
                        <small class="form-text text-muted">
                            <i class="las la-info-circle"></i> You can only upload a maximum of 4 images
                        </small>
                    </div>
<<<<<<< HEAD
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="barcode" class="control-label mb-1">Enter Barcode</label>
                            <input id="barcode" name="barcode" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('barcode')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="name">Barcode Generator</label>
                            <button type="button" onclick="generateBarcode()" class="btn btn-success"
                                style="display: block">Barcode</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="control-label mb-1">Product Description</label>
                            <textarea id="product_description" name="product_description" rows="6" cols="50" placeholder="Enter detailed product description..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="avatar-edit mb-4" id="imageContainer">
                    <h6 class="mb-4">Product Image</h6>
                    <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Default Image"
                        class="input_image">
                    <label for="image" id="editIcon"><i class="fas fa-pencil-alt"></i></label>
                    <input id="mainImage" name="image" type="file" style="display: none;">
                    @error('image')
                    <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-field">
                    <h6 class="mb-4">Additional Images</h6>
                    <div class="input-images"></div>
                    <small class="form-text text-muted">
                        <i class="las la-info-circle"></i> @lang('You can only upload a maximum of 6 images')</label>
                    </small>
                </div>

                <!-- Preview Container -->
                <div id="image-preview-content"></div>
                <button type="submit" class="btn btn-success mt-3">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body text-center">
                <i class="las la-times-circle f-size--100 text--danger mb-15"></i>
                <h3 class="text--danger mb-15">@lang('Error: Cannot process your entry!')</h3>
                <p class="mb-15">@lang('You can\'t add more than 4 image')</p>
                <button type="button" class="btn btn--danger" data-dismiss="modal">@lang('Continue')</button>
=======

                    <div id="image-preview-content"></div>

                    <button type="submit" class="btn btn-success mt-3">Save</button>
                </form>
>>>>>>> 92e528bd8759cefadd67b4ef8ffad44358003e86
            </div>
        </div>
    </div>

    {{-- Image Upload Limit Modal --}}
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body text-center">
                    <i class="las la-times-circle f-size--100 text--danger mb-3"></i>
                    <h3 class="text--danger mb-3">Error: Cannot process your entry!</h3>
                    <p class="mb-3">You can't add more than 4 images</p>
                    <button type="button" class="btn btn--danger" data-dismiss="modal">Continue</button>
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

            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'photos',
                preloadedInputName: 'old',
                maxFiles: 4
            });

            // Image preview main image
            const imageUpload = document.getElementById('mainImage');
            const previewImage = document.getElementById('imagePreview');
            const editIcon = document.getElementById('editIcon');

            if (previewImage && imageUpload) {
                previewImage.addEventListener('click', () => imageUpload.click());
            }

            if (editIcon && imageUpload) {
                editIcon.addEventListener('click', () => imageUpload.click());
            }

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

            // Barcode generator
            window.generateBarcode = function() {
                let barcode = Date.now() + Math.floor(Math.random() * 90 + 10);
                document.getElementById('barcode').value = barcode;
            };

        })(jQuery);
    </script>
@endsection
