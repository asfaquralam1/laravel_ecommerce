@extends('admin.master')
@section('page_title', 'Edit Coupon')
@section('edit_coupon', 'active')
@section('content')
    <div class="layout-wrapper">
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <div class="card-title">
                <h5>Edit Coupon</h5>
                <a class="btn-warning back-btn" href="{{ route('admin.coupons.update', $coupon->id) }}">
                    <i class="fas fa-backward"></i> Go Back
                </a>
            </div>
            <div class="add-form">
                <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="code" class="form-label">Coupon Code</label>
                        <input type="text" name="code" class="form-control" value="{{ $coupon->code }}" required>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="fixed" {{ old('type', $coupon->type ?? '') == 'fixed' ? 'selected' : '' }}>Fixed
                            </option>
                            <option value="percent" {{ old('type', $coupon->type ?? '') == 'percent' ? 'selected' : '' }}>
                                Percent</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Value</label>
                        <input type="number" name="value" step="0.01" class="form-control"
                            value="{{ $coupon->value }}" required>
                        @error('value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="min_order_amount" class="form-label">Minimum Order Amount</label>
                        <input type="number" name="min_order_amount" step="0.01" class="form-control"
                            value="{{ $coupon->min_order_amount }}">
                        @error('min_order_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="expires_at" class="form-label">Expires At</label>
                        <input type="date" name="expires_at" class="form-control"
                            value="{{ $coupon->expires_at ? \Carbon\Carbon::parse($coupon->expires_at)->format('Y-m-d') : '' }}">
                        @error('expires_at')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                            {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                </form>
            </div>
        </div>
    </div>
@endsection
