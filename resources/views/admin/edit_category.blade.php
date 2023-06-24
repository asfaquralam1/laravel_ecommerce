@extends('admin.layout')
@section('page_title','Update Category')
@section('container')
<h1 class="mb-10">Update Category</h1>

<a href="{{ route('admin/category')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Category</h3>
                </div>
                <hr>
                <form action="{{url('admin/category/update-category/')}}/{{$category->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control" value="{{ $category->category_name }}">
                        @error('category_name')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" name="category_slug" type="text" class="form-control" value="{{ $category->category_slug }}">
                        @error('category_slug')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection