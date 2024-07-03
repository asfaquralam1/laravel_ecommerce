@extends('admin.master')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('container')
    <h1>Category</h1>
    <div class="row">
            @foreach ($categories as $category)
                <p>Category Name : {{ $category->name }}</p>
                <p>Category Slug : {{ $category->slug }}</p>
                @if ($category->status == 1)
                    <a href="{{ url('admin/category/status/0') }}/{{ $category->id }}">
                        <button type="submit" class="btn btn-success"
                            style="padding: 5px 18px 5px 18px !important">Active</button>
                    </a>
                @elseif ($category->status == 0)
                    <a href="{{ url('admin/category/status/1') }}/{{ $category->id }}">
                        <button type="submit" class="btn btn-secondary"
                            style="padding: 5px 18px 5px 18px !important">Deactive</button>
                    </a>
                @endif
                <a href="{{ route('admin/edit-category', $category->id) }}"><button>Edit</button></a>
                <form action="{{ route('admin/destory-category', $category->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>
            @endforeach
        </div>
@endsection
