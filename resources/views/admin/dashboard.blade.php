@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
    @include('admin.partials.header')
    <div class="dashboard-content">
        <div class="item_card">
            <p>87 <br> Customers</p>
            <i class="fas fa-users"></i>
        </div>
        <div class="item_card">
            <p>{{ $products }} <br> Products</p>
            <i class="fas fa-tshirt"></i>
        </div>
        <div class="item_card">
            <p>{{ $orders }} <br> Orders</p>
            <i class="fas fa-cart-arrow-down"></i>
        </div>
        <div class="item_card">
            <p>{{ $categories }} <br> Categories</p>
            <i class="fas fa-tag"></i>
        </div>
    </div>
    <div class="dashboard_footer">
        <div class="dashboard_table_area">
            <div class="dashboard_table_header">
                <h4>Top Selling</h4>
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
        <div class="dashboard_table_area">
            <div class="dashboard_table_header">
                <h4>Top Selling</h4>
                <a href="#" class="view-btn">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
