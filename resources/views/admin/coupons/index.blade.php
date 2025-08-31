
@extends('admin.master')
@section('page_title', 'Coupons')
@section('coupon_select', 'active')
@section('content')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="card-title">
            <h5>Coupons</h5>
            <a class="btn-success add-btn" href="{{ route('admin.coupons.create') }}">
                <i class="fas fa-plus"></i> Create Coupon
            </a>
        </div>
        <div class="table_area">
            <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Min Order Amount</th>
                <th>Expires At</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        {{-- <tbody>
            @forelse($coupons as $coupon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ ucfirst($coupon->type) }}</td>
                    <td>
                        @if($coupon->type == 'percent')
                            {{ $coupon->value }}%
                        @else
                            ${{ number_format($coupon->value, 2) }}
                        @endif
                    </td>
                    <td>${{ number_format($coupon->min_order_amount, 2) }}</td>
                    <td>{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : 'No Expiry' }}</td>
                    <td>
                        @if($coupon->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $coupon->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No coupons found.</td>
                </tr>
            @endforelse
        </tbody> --}}
    </table>
        </div>
    </div>
</div>
@endsection