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
                    <div class="avatar-edit" id="imageContainer">
                        <!-- Display existing image or default placeholder -->
                        <img id="imagePreview" src="{{ asset('image/upload.png') }}" alt="Default Image" class="input_image" style="max-width: 200px; margin-bottom: 10px;">
                        <label id="editIcon" class="btn btn-secondary" for="image">
                            <i class="fas fa-pencil-alt"></i> Choose Image
                        </label>
                        <input id="mainImage" name="image" type="file" style="visibility: hidden;">
                        @error('image')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- image gallery-->
                    <div>
                        <h6 class="mb-4">Thumbline Images</h6>
                        <input type="file" name="thumbs[]" id="image-upload" multiple><br><br>
                        @error('thumbnail')
                            <div class="text-center text-danger">{{ $message }}</div>
                        @enderror
                    </div>

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

        //barcode generator
        function generateBarcode() {
            let barcode = Date.now() + (Math.floor(Math
                .random() * (99 - 10 + 1)) + 10);
            let barcodeElement = document.getElementById('barcode');
            barcodeElement.value = barcode;
        }
    </script>

    <script>
        const MAX_IMAGE_COUNT = 4; // Define the maximum number of images allowed
        const uploadedImageUrls = new Set(); // Set to store unique image URLs

        document.getElementById('image-upload').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview-container');
            const files = event.target.files;

            // Loop through each file and create an image preview
            Array.from(files).forEach((file) => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgDataUrl = e.target.result;

                        // Check if the image has already been uploaded
                        if (uploadedImageUrls.has(imgDataUrl)) {
                            return; // Skip if the image is already uploaded
                        }

                        // Check if the set size exceeds the max limit
                        if (uploadedImageUrls.size >= MAX_IMAGE_COUNT) {
                            alert('You can only upload up to 4 images.');
                            return;
                        }

                        // Add the image URL to the Set (this automatically ensures uniqueness)
                        uploadedImageUrls.add(imgDataUrl);

                        // Create a container div for each image
                        const imageDiv = document.createElement('div');
                        imageDiv.classList.add('image-preview-container');
                        imageDiv.style.position = 'relative';

                        // Create the image element
                        const img = document.createElement('img');
                        img.src = imgDataUrl;
                        img.classList.add('image-preview');
                        img.style.width = '280px'; // Optional: Set max width of preview images
                        img.style.height = '150px';
                        img.style.marginRight = '10px'; // Optional: Add some space between images

                        // Create the edit icon
                        const editIcon = document.createElement('span');
                        editIcon.classList.add('edit-icon');
                        editIcon.innerHTML = '&#9998;'; // Edit icon (pencil)
                        editIcon.style.position = 'absolute';
                        editIcon.style.top = '5px';
                        editIcon.style.right =
                            '130px'; // Adjust position so it doesn't overlap with delete icon
                        editIcon.style.fontSize = '17px';
                        editIcon.style.color = 'white';
                        editIcon.style.cursor = 'pointer';

                        // Create the delete icon
                        const deleteIcon = document.createElement('span');
                        deleteIcon.classList.add('delete-icon');
                        deleteIcon.innerHTML = '&#10060;'; // Delete icon (cross)
                        deleteIcon.style.position = 'absolute';
                        deleteIcon.style.top = '5px';
                        deleteIcon.style.right = '10px';
                        deleteIcon.style.fontSize = '17px';
                        deleteIcon.style.color = 'white';
                        deleteIcon.style.cursor = 'pointer';

                        // Append the image, edit icon, and delete icon to the container
                        imageDiv.appendChild(img);
                        imageDiv.appendChild(editIcon);
                        imageDiv.appendChild(deleteIcon);

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
                                        img.src = event.target
                                            .result; // Update the preview image
                                        // Remove the old image data URL from the Set and add the new one
                                        uploadedImageUrls.delete(imgDataUrl);
                                        uploadedImageUrls.add(event.target.result);
                                    };

                                    reader.readAsDataURL(newFile); // Read the new image
                                }
                            });

                            newInput.click(); // Open the file input dialog
                        });

                        // Handle image deletion when the delete icon is clicked
                        deleteIcon.addEventListener('click', function() {
                            previewContainer.removeChild(
                                imageDiv); // Remove the image preview container
                            // Remove the image URL from the uploadedImageUrls Set (if deleting)
                            uploadedImageUrls.delete(imgDataUrl);
                        });
                    };

                    reader.readAsDataURL(file); // Read the image file as a data URL
                }
            });
        });
    </script>

@endsection
