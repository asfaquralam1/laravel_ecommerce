@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.sidebar')
        </div>
        <div class="col-10">
            <div
                style="display:flex;justify-content: space-between;box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);padding:10px !important;">
                <h4></i>Dashboard</h4>
                <p><i class="fas fa-user"></i>{{ auth()->user() }}</p>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="dasboard_top_card">
                        <p>87 <br> Customers</p>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dasboard_top_card">
                        <p>{{ $products }} <br> Products</p>
                        <i class="fas fa-tshirt"></i>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dasboard_top_card">
                        <p>{{ $orders }} <br> Orders</p>
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dasboard_top_card">
                        <p>{{ $categories }} <br> Categories</p>
                        <i class="fas fa-tag"></i>
                    </div>
                </div>
            </div>
            <div class="">
                <table class="table">
                    <h4>Top Selling Products</h4>
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
@endsection
