@extends('admin.layout')
@section('page_title','Manage Coupon')
@section('coupon_select','active')
@section('container')
<h1 class="mb-10">Manage Coupon</h1>

<a href="{{ route('admin/coupon')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Add Coupon</h3>
                </div>
                <hr>
                <form action="{{ route('coupon.add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="coupon_name" class="control-label mb-1">Coupon Title</label>
                        <input id="coupon_name" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('title')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                        <input id="coupon_code" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('coupon_code')
                        <div class="text-center text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coupon_value" class="control-label mb-1">Coupon Value</label>
                        <input id="coupon_value" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('coupon_value')
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
