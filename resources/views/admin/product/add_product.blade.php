@extends('admin.master')
@section('page_title', 'Add Product')
@section('product_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <!-- <h5 style="text-align: center;">Create product</h5> -->
        <div class="card-title">
            <h5 style=" margin-left: 20px;">Create product</h5>
            <a class="btn-warning back-btn" href="{{ route('admin.product') }}"><i class="fas fa-backward"></i> Go
                Back</a>
        </div>
        <div class="add-form">
            <form action="{{ route('admin.add.product') }}" method="post" enctype="multipart/form-data">
                <h3 class="mb-4">Product Information</h3>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="control-label mb-1">Product Name</label>
                            <input id="name" name="name" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('name')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category" class="control-label mb-1">Category</label>
                            <select name="category" class="form-select">
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
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="details" class="control-label mb-1">Product Details</label>
                            <input id="details" name="details" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                            @error('details')
                            <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="control-label mb-1">Product Price</label>
                            <input id="price" name="price" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                            @error('price')
                            <div class="text-center text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="discount_price" class="control-label mb-1">Product Discount
                                Price</label>
                            <input id="discount_price" name="discount_price" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('discount_price')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="quantity" class="control-label mb-1">Product Stock Quantity</label>
                            Price</label>
                            <input id="quantity" name="quantity" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('discount_price')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="barcode" class="control-label mb-1">Enter Barcode</label>
                            <input id="barcode" name="barcode" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('barcode')
                        <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="name">Barcode Generator</label>
                            <button type="button" onclick="generateBarcode()" class="btn btn-success"
                                style="display: block">Barcode</button>
                        </div>
                    </div>
                </div>
                <!-- main image -->
                <div class="avatar-edit">
                    <h6 class="mb-4">Product Image</h6>
                    <img id="imagePreview" src="/product/1719988391.png" alt="Image Preview" class="input_image">
                    <div>
                        <label for="image"><i class="fas fa-pencil-alt"></i></label>
                        <input id="image" name="image" type="file" style="visibility: hidden;">
                    </div>
                    @error('image')
                    <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                </div>

                 <!-- image gallery-->
                <label for="images">Select Images</label>
                <input type="file" name="thumbs[]" id="image-upload" multiple><br><br>

                <!-- Preview Container -->
                <div id="image-preview-container"></div>
                <button type="submit" class="btn btn-success mt-3">
                    Save
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


    function generateBarcode() {
        let barcode = Date.now() + (Math.floor(Math
            .random() * (99 - 10 + 1)) + 10);
        let barcodeElement = document.getElementById('barcode');
        barcodeElement.value = barcode;
    }
</script>

<script>
    document.getElementById('image-upload').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = '';  // Clear previous previews

        const files = event.target.files;

        // Loop through each file and create an image preview
        Array.from(files).forEach((file, index) => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create a container div for each image
                    const imageDiv = document.createElement('div');
                    imageDiv.classList.add('image-preview-container');
                    imageDiv.style.position = 'relative';

                    // Create the image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('image-preview');
                    img.style.maxWidth = '150px'; // Optional: Set max width of preview images
                    img.style.marginRight = '10px'; // Optional: Add some space between images

                    // Create the edit icon
                    const editIcon = document.createElement('span');
                    editIcon.classList.add('edit-icon');
                    editIcon.innerHTML = '&#9998;'; // Edit icon (pencil)
                    editIcon.style.position = 'absolute';
                    editIcon.style.top = '5px';
                    editIcon.style.right = '5px';
                    editIcon.style.fontSize = '20px';
                    editIcon.style.color = 'white';
                    editIcon.style.cursor = 'pointer';

                    // Append the image and the edit icon to the container
                    imageDiv.appendChild(img);
                    imageDiv.appendChild(editIcon);

                    // Append the container to the preview container
                    previewContainer.appendChild(imageDiv);

                    // Handle image replacement when the edit icon is clicked
                    editIcon.addEventListener('click', function() {
                        // Open the file input dialog to choose a new image
                        const newInput = document.createElement('input');
                        newInput.type = 'file';
                        newInput.accept = 'image/*';
                        
                        // When a new file is selected, replace the image and update the preview
                        newInput.addEventListener('change', function(e) {
                            const newFile = e.target.files[0];
                            if (newFile && newFile.type.startsWith('image/')) {
                                const reader = new FileReader();
                                
                                reader.onload = function(event) {
                                    img.src = event.target.result;  // Update the preview image
                                };

                                reader.readAsDataURL(newFile);  // Read the new image
                            }
                        });

                        newInput.click();  // Open the file input dialog
                    });
                };

                reader.readAsDataURL(file);  // Read the image file as a data URL
            }
        });
    });
</script>

@endsection