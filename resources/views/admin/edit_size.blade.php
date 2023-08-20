@extends('admin.layout')
@section('page_title','Update Size')
@section('size_select','active')
@section('container')
<h1 class="mb-10">Update Size</h1>

<a href="{{ route('admin/size')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update size</h3>
                </div>
                <hr>
                <form action="{{url('admin/size/update-size/')}}/{{$size->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="size_name" class="control-label mb-1">size</label>
                        <input id="size_name" name="size_name" type="text" class="form-control" value="{{ $size->size_name }}">
                        @error('size_name')
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
