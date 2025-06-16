{{-- @extends('admin.master')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('content')
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
                                <button type="submit" class="btn-success action-btn" id="submit"><i
                                        class="fas fa-toggle-on"></i></button>
                            </form>
                            @elseif ($category->status == 0)
                            <form action="{{ url('admin/category/status/1') }}/{{ $category->id }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn-dark action-btn"><i
                                        class="fas fa-toggle-off"></i></button>
                            </form>
                            @endif
                            <a class="btn-warning action-btn"
                                href="{{ route('admin.edit.category', $category->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.destory.category', $category->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn-danger action-btn"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection --}}

@extends('admin.master')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('content')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5>Categories</h5>
            <a class="btn-success add-btn" href="{{ route('admin.manage.category') }}">
                <i class="fas fa-plus"></i> Add Category
            </a>
        </div>
        <div class="table_area">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            @if ($category->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="action_icon_row">
                            <!-- Toggle Status Form -->
                            <form action="{{ route('admin.status.category', ['status' => $category->status == 1 ? 0 : 1, 'id' => $category->id]) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $category->status == 1 ? 'btn-success' : 'btn-dark' }}" aria-label="Toggle Status">
                                    <i class="fas {{ $category->status == 1 ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </button>
                            </form>

                            <!-- Edit Button -->
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.edit.category', $category->id) }}" aria-label="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete Form -->
                            <form action="{{ route('admin.destory.category', $category->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" aria-label="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection