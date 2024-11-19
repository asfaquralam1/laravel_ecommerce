@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
<div class="layout-wrapper">
    @include('admin.partials.sidebar')
    <div class="dashboard-content">
        <div class="item_card">
            <p>{{ $total_users }} <br> Customers</p>
            <i class="fas fa-users"></i>
        </div>
        <div class="item_card">
            <p>{{ $total_products }} <br> Products</p>
            <i class="fas fa-tshirt"></i>
        </div>
        <div class="item_card">
            <p>{{ $total_orders }} <br> Orders</p>
            <i class="fas fa-cart-arrow-down"></i>
        </div>
        <div class="item_card">
            <p>{{ $total_categories }} <br> Categories</p>
            <i class="fas fa-tag"></i>
        </div>
    </div>
    <div class="dashboard_footer">
        <div class="table_area">
            <div class="dashboard_table_header">
                <h4>Top Selling</h4>
                <a href="{{ route('admin.order') }}" class="view-btn">View All</a>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Customer Name</th>
                            <!-- <th class="text-center">Address</th> -->
                            <th class="text-center">Grand Total</th>
                            <!-- <th class="text-center">Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                            <td>{{ $order->name }}</td>
                            <!-- <td>{{ $order->address }}</td> -->
                            <td class="text-center">{{ $order->grand_total }}</td>
                            <!-- <td>
                                @if ($order->status == 'pending')
                                <button class="btn btn-warning"
                                    style="padding: 5px 10px 5px 10px !important; margin: 0 5px !important;">{{ $order->status }}</button>
                                @else
                                <button class="btn btn-danger">{{ $order->status }}</button>
                                @endif
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table_area">
            <div class="dashboard_table_header">
                <h4>Users</h4>
                <a href="#" class="view-btn">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection