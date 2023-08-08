@extends('admin.layout')
@section('page_title','Update Color')
@section('color_select','active')
@section('container')
<h1 class="mb-10">Update Color</h1>

<a href="{{ route('admin/color')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Color</h3>
                </div>
                <hr>
                <form action="{{url('admin/color/update-color/')}}/{{$color->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="color" class="control-label mb-1">Color Name</label>
                        <input id="color" name="color" type="text" class="form-control" value="{{ $color->color }}">
                        @error('title')
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
