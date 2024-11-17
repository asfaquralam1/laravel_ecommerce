@extends('admin.master')
@section('page_title', 'Order')
@section('order_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <div class="info-section">
            <div class="card-title">
                <h5>orders</h5>
            </div>
            <div class="table_area">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Payment Method</th>
                            <th class="text-center">Grand Total</th>
                            <th class="text-center">Transaction Id</th>
                            <th class="text-center">Shipping</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td class="text-center">{{ $order->grand_total }}</td>
                            <td class="text-center">{{ $order->transaction_id }}</td>
                            <td class="text-center">{{ $order->shipping }}</td>
                            <td>
                                @if ($order->status == 'pending')
                                <button class="btn btn-warning" style="padding: 5px 10px 5px 10px !important; margin: 0 5px !important;">{{ $order->status }}</button>
                                @else
                                <button class="btn btn-danger">{{ $order->status }}</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
