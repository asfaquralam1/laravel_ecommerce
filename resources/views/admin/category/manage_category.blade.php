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
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Category Slug</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                    <tbody>
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td style="display:flex; flex-direction: row;justify-content:space-around;">
                                @if ($category->status == 1)
                                    <form action="{{ url('admin/category/status/0') }}/{{ $category->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success status-btn" id="submit"><i
                                                class="fas fa-toggle-on"></i></button>
                                    </form>
                                @elseif ($category->status == 0)
                                    <form action="{{ url('admin/category/status/1') }}/{{ $category->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-dark status-btn"><i
                                                class="fas fa-toggle-off"></i></button>
                                    </form>
                                @endif
                                <a class="btn btn-warning edit-btn"
                                    href="{{ route('admin/edit-category', $category->id) }}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin/destory-category', $category->id) }}" method="post">
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
@endsection
