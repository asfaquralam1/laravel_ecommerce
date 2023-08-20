@extends('admin.layout')
@section('page_title', 'Size')
@section('size_select', 'active')
@section('container')
    <h1 class="mb-10">Size</h1>

    <a href="{{ route('admin/manage-size') }}">
        <button type="button" class="btn btn-success">Add Size</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->size_name }}</td>
                                <td class="text-right">
                                    <a href="{{ url('admin/size/edit-size/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ url('admin/size/delete-size/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </a>
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
