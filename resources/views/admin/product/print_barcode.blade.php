@extends('admin.master')
@section('page_title', 'Product Barcode Print')
@section('product_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <!-- <div class="card-title">
            <h5>Print Product Barcode</h5>
            <a class="btn-success add-btn" href="{{ route('admin.manage.product') }}"><i class="fas fa-plus"></i> Add
                New</a>
        </div> -->
        <h5><i class="fa fa-th"></i> {{ $pageTitle }} - {{ $subTitle }}</h5>
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
                                href="{{ route('admin.edit.product', $product->id) }}">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection