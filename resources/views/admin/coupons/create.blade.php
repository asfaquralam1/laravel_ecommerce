@extends('admin.master')
@section('page_title', '>Create Coupon')
@section('create_coupon', 'active')
@section('content')
<div class="container">
    <h2>Create Coupon</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="code" class="form-label">Coupon Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" class="form-control" required>
                <option value="">Select Type</option>
                <option value="fixed" {{ old('type')=='fixed'?'selected':'' }}>Fixed</option>
                <option value="percent" {{ old('type')=='percent'?'selected':'' }}>Percent</option>
            </select>
            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="number" name="value" step="0.01" class="form-control" value="{{ old('value') }}" required>
            @error('value') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="min_order_amount" class="form-label">Minimum Order Amount</label>
            <input type="number" name="min_order_amount" step="0.01" class="form-control" value="{{ old('min_order_amount', 0) }}">
            @error('min_order_amount') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="expires_at" class="form-label">Expires At</label>
            <input type="date" name="expires_at" class="form-control" value="{{ old('expires_at') }}">
            @error('expires_at') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ old('is_active', true) ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Coupon</button>
    </form>
</div>
@endsection
