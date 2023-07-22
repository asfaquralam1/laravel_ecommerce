@extends('admin.layout')
@section('page_title', 'Coupon')
@section('coupon_select', 'active')
@section('container')
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
    <h1 class="mb-10">Coupon</h1>

    <a href="{{ route('admin/manage-coupon') }}">
        <button type="button" class="btn btn-success">Add Coupon</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Coupon Title</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->title }}</td>
                                <td>{{ $res->code }}</td>
                                <td>{{ $res->value }}</td>
                                <td class="text-right">
                                    <a href="{{ url('admin/coupon/edit-coupon/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ url('admin/coupon/delete-coupon/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </a>
                                    @if ($res->status == 1)
                                        <a href="{{ url('admin/coupon/status/0') }}/{{ $res->id }}">
                                            <button type="submit" class="btn btn-success">Active</button>
                                        </a>
                                    @elseif ($res->status == 0)
                                        <a href="{{ url('admin/coupon/status/1') }}/{{ $res->id }}">
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
