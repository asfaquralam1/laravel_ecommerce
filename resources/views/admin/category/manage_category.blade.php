@extends('admin.master')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5>Categories</h5>
            <a class="btn-success add-btn" href="{{ route('admin.manage.category') }}"><i class="fas fa-plus"></i> Add
                Category</a>
        </div>
        <div class="table_area">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="action_icon_row">
                            @if ($category->status == 1)
                            <form action="{{ url('admin/category/status/0') }}/{{ $category->id }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-success status-btn" id="submit"><i
                                        class="fas fa-toggle-on"></i></button>
                            </form>
                            @elseif ($category->status == 0)
                            <form action="{{ url('admin/category/status/1') }}/{{ $category->id }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-dark status-btn"><i
                                        class="fas fa-toggle-off"></i></button>
                            </form>
                            @endif
                            <a class="btn btn-warning edit-btn"
                                href="{{ route('admin.edit.category', $category->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.destory.category', $category->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection