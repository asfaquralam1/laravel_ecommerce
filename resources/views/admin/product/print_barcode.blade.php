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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <h1>Hello</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
                    @php
                    $id = 1
                    @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$id++}}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->name }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        @php
                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                        @endphp
                        <td><img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('000005263635', $generatorPNG::TYPE_CODE_128)) }}"></td>
                        <td><input type="number" min="1" placeholder="Print Quantity"></td>
                        <td class="action_icon_row">
                            <a class="btn btn-success"
                                href="{{ route('admin.printbarcode.product', $product->id) }}">Add to Printlist</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection