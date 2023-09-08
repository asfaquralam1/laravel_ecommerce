@extends('admin.layout')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <div class="text-success">{{ session('message') }}</div>
    <h1 class="mb-10">Product</h1>

    <a href="{{ route('admin/manage-product') }}">
        <button type="button" class="btn btn-success">Add product</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>short_desc</th>
                            <th>category</th>
                            <th>size</th>
                            <th>color</th>
                            <th>coupon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <th>{{ $res->product_name }}</th>
                                <td>{{ $res->short_desc }}</td>
                                <th>{{ $res->category_id }}</th>
                                <th>{{ $res->size_id }}</th>
                                <th>{{ $res->color_id }}</th>
                                <th>{{ $res->coupon_id }}</th>
                                <td class="text-right">
                                    <a href="{{ url('admin/product/edit-product/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ url('admin/product/delete-product/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </a>
                                    @if ($res->status == 1)
                                        <a href="{{ url('admin/product/status/0') }}/{{ $res->id }}">
                                            <button type="submit" class="btn btn-success">Active</button>
                                        </a>
                                    @elseif ($res->status == 0)
                                        <a href="{{ url('admin/product/status/1') }}/{{ $res->id }}">
                                            <button type="submit" class="btn btn-secondary">Deactive</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>

    </div>
@endsection
