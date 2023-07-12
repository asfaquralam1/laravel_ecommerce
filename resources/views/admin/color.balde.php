@extends('admin.layout')
@section('page_title', 'Color')
@section('color_select', 'active')
@section('container')
    <div class="text-success">{{ session('message') }}</div>
    <h1 class="mb-10">Color</h1>

    <a href="{{ route('admin/manage-color') }}">
        <button type="button" class="btn btn-success">Add Color</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->color }}</td>
                                <td>{{ $res->size }}</td>
                                <td class="text-right">
                                    <a href="{{ url('admin/color/edit-color/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ url('admin/color/delete-color/') }}/{{ $res->id }}">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </a>
                                    @if ($res->status == 1)
                                        <a href="{{ url('admin/color/status/0') }}/{{ $res->id }}">
                                            <button type="submit" class="btn btn-success">Active</button>
                                        </a>
                                    @elseif ($res->status == 0)
                                        <a href="{{ url('admin/color/status/1') }}/{{ $res->id }}">
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
