@extends('admin.master')
@section('page_title', 'Add Category')
@section('category_select', 'active')
@section('container')
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Add Category</h3>
                    </div>
                    <hr>
                    <form action="{{ route('admin/add-category') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Category Name</label>
                            <input id="category_name" name="name" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                            {{-- @error('name')
                                <div class="text-center text-danger">{{ $message }}</div>
                            @enderror --}}
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="" data-dismiss="alert" aria-hidden="true">x</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                            <input id="category_slug" name="slug" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                            @error('slug')
                                <div class="text-center text-danger">{{ $message }}</div>
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
