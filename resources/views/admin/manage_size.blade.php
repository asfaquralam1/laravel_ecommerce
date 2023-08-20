@extends('admin.layout')
@section('page_title','Manage Size')
@section('size_select','active')
@section('container')
<h1 class="mb-10">Manage size</h1>

<a href="{{ route('admin/size')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Add Size</h3>
                </div>
                <hr>
                <form action="{{ route('size.add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="size_name" class="control-label mb-1">Size</label>
                        <input id="size_name" name="size_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
