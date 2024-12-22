@extends('admin.master')
@section('page_title', 'Product Barcode Print')
@section('product_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5><i class="fa fa-th"></i> {{ $pageTitle }} - {{ $subTitle }}</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" id="barcode_print_list" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Barcode Print List
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Barcode Print Products List</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center"> # </th>
                                        <th class="text-center">Barcode</th>
                                        <th class="text-center"> Print Quantity </th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="modalBody">
                                    <!-- Data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer" id="modalFooter" style="display: flex; justify-content: flex-start;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="table_area">
            <table id="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th class="text-center">Stock Quantity</th>
                        <th>Barcode Image</th>
                        <th>Print Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->name }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        @php
                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                        @endphp
                        <td><img
                                src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('000005263635', $generatorPNG::TYPE_CODE_128)) }}">
                        </td>
                        <td><input type="number" min="1" placeholder="Print Quantity"
                                id="myInput{{ $loop->index }}" class="form-control"></td>
                        <td class="action_icon_row">
                            <button class="btn btn-sm btn-primary"
                                onclick="addToPrint('{{ $loop->index }}','{{ $product->id }}', '{{ $product->barcode }}', '{{ $product->name }}', '{{ $product->total_quantity }} {{ $product->measurement_unit }}', '{{ $product->total_price }}')">Add
                                to Print</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
{{-- we need to add  @stack('scripts') in the app.blade.php for the following scripts --}}
@push('scripts')
<script type="text/javascript">
    let selectedItems = [];

    function addToPrint(index, id, barcode, name, quantity, price) {
        let printQuantity = document.getElementById("myInput" + index).value;
        if (printQuantity && printQuantity > 0) {
            let tableBody = document.getElementById('modalBody');
            let existingRow = null;

            let rows = tableBody.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                let barcodeCell = rows[i].getElementsByTagName('td')[1]; // Barcode is in the 2nd column
                if (barcodeCell && barcodeCell.textContent === barcode) {
                    existingRow = rows[i];
                    break;
                }
            }

            if (existingRow) {
                let currentQuantityCell = existingRow.getElementsByTagName('td')[2];
                let currentQuantity = parseInt(currentQuantityCell.textContent);
                currentQuantityCell.textContent = currentQuantity + parseInt(printQuantity);

                const item = selectedItems.find(item => item.id === id);
                if (item) {
                    item.quantity += parseInt(printQuantity); // Increment the quantity
                }
            } else {
                // Create a new row if barcode doesn't exist
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                                <td class="text-center">${tableBody.children.length + 1}</td>
                                <td class="text-center">${barcode}</td>
                                <td class="text-center">${printQuantity}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-danger" onclick="removeRow(this, ${id}, ${printQuantity})">x</button>
                                </td>
                            `;
                tableBody.appendChild(newRow);

                //showing how many items added in the table
                let rowCount = modalBody.getElementsByTagName('tr').length;
                const barcode_print_list = document.getElementById('barcode_print_list');
                barcode_print_list.textContent = `Barcode Print List (${rowCount})`;

                // Add the id and quantity to the selectedItems array
                selectedItems.push({
                    id: id,
                    quantity: parseInt(printQuantity)
                });
            }

            // Optionally reset the input field
            document.getElementById("myInput" + index).value = '';

            const modalFooter = document.querySelector('.modal-footer');

            let existingDownloadButton = modalFooter.querySelector('.download-button');
            if (existingDownloadButton) {
                existingDownloadButton.remove();
            }

            const downloadButton = document.createElement('a');
            const params = selectedItems.map(item => `${item.id}:${item.quantity}`).join(',');
            const downloadUrl = `{{ route('admin.product.barcode.pdf', ':ids') }}`.replace(':ids', params);

            downloadButton.href = downloadUrl;
            downloadButton.textContent = 'Download All Barcodes';
            downloadButton.classList.add('modal-close', 'btn', 'btn-primary', 'download-button');
            modalFooter.appendChild(downloadButton);

            // Show the modal
            //$('#exampleModal').modal('show');
        } else {
            alert("Please enter a valid print quantity.");
        }
    }

    function removeRow(button, id, printQuantity) {
        let row = button.closest('tr');

        row.remove();
        selectedItems = selectedItems.filter(item => item.id != id)

        const modalFooter = document.querySelector('.modal-footer');
        let existingDownloadButton = modalFooter.querySelector('.download-button');

        if (selectedItems.length === 0 && existingDownloadButton) {
            existingDownloadButton.remove();
        } else {
            if (existingDownloadButton) {
                const params = selectedItems.map(item => `${item.id}:${item.quantity}`).join(',');
                const downloadUrl = `{{ route('admin.product.barcode.pdf', ':ids') }}`.replace(':ids', params);
                existingDownloadButton.href = downloadUrl;
            }
        }
    }
</script>