@extends('admin.layout')
@section('page_title', 'Catagory')
@section('category_select', 'active')
@section('container')
{!! session('success') !!}
<h1 class="mb-10">Category</h1>

<a href="{{ route('admin/manage-category') }}">
    <button type="button" class="btn btn-success">Add Catagory</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $res)
                    <tr>
                        <td>{{ $res->id }}</td>
                        <td>{{ $res->category_name }}</td>
                        <td>{{ $res->category_slug }}</td>
                        <td class="text-right">
                            <a href="{{ url('admin/category/edit-category/') }}/{{ $res->id }}">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ url('admin/category/delete-category/') }}/{{ $res->id }}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </a>
                            @if ($res->status == 1)
                            <a href="{{ url('admin/category/status/0') }}/{{ $res->id }}">
                                <button type="submit" class="btn btn-success">Active</button>
                            </a>
                            @elseif ($res->status == 0)
                            <a href="{{ url('admin/category/status/1') }}/{{ $res->id }}">
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