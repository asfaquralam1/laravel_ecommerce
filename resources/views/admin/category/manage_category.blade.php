@extends('admin.master')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('container')
<div class="row">
    <div class="col-2">
        @include('admin.partials.sidebar')
    </div>
    <div class="col-10">
        <div class="header_card">
            <i class="fas fa-bars"></i>
            <p><i class="fas fa-user"></i>{{ auth()->user() ? auth()->user()->name : '' }}</p>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th colspan="3">action</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    @if ($category->status == 1)
                    <form action="{{ url('admin/category/status/0') }}/{{ $category->id }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success status-btn" id="submit">Active</button>
                    </form>
                    @elseif ($category->status == 0)
                    <form action="{{ url('admin/category/status/1') }}/{{ $category->id }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary status-btn">Deactive</button>
                    </form>
                    @endif
                </td>
                <td><a href="{{ route('admin/edit-category', $category->id) }}"><button
                            class="btn btn-primary edit-btn">Edit</button></a>
                </td>
                <td>
                    <form action="{{ route('admin/destory-category', $category->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
