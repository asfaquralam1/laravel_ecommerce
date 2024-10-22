@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
@include('admin.partials.header')
<div class="row w-100">
    <div class="col-md-2">
        @include('admin.partials.sidebar')
    </div>
    <div class="col-md-10 col-sm-12">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content" style="padding: 30px 0">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="item_card">
                            <p>87 <br> Customers</p>
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="item_card">
                            <p>{{ $products }} <br> Products</p>
                            <i class="fas fa-tshirt"></i>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="item_card">
                            <p>{{ $orders }} <br> Orders</p>
                            <i class="fas fa-cart-arrow-down"></i>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="item_card">
                            <p>{{ $categories }} <br> Categories</p>
                            <i class="fas fa-tag"></i>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="dashbaord_card">
                    <table class="table">
                        <div style="display: flex;flex-direction:row;justify-content:space-between">
                            <h4>Top Selling Products</h4>
                            <a href=""><strong>View All</strong></a>
                        </div>
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
            <div class="col-md-4">
                <div class="dashbaord_card">
                    <table class="table">
                        <div style="display: flex;flex-direction:row;justify-content:space-between">
                            <h4>Top</h4>
                            <a href=""><strong>View All</strong></a>
                        </div>
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
</div>
@endsection