@extends('site.pages.master')
@section('content')
    <section id="profile-page">
        <div class="container">
            <h1 class="text-center">My Account</h1>
            <div class="row">
                <div class="col-2">
                    <div class="options" style="display: flex;flex-direction: column">
                        <a class="profile-btn" href="{{ route('profile') }}"> <i class="fas fa-user"></i> <span style="margin-left: 5px">My profile</span></a>
                        <a class="profile-btn" href="{{ route('profile') }}"> <i class="fas fa-shopping-bag"></i> <span style="margin-left: 5px">My Orders</span></a>
                        <a class="profile-btn" href="{{ route('profile') }}"> <i class="fas fa-lock"></i> <span style="margin-left: 5px">Change Password</span></a>
                        <a class="profile-btn" href="{{ route('user.logout') }}"> <i class="fas fa-arrow-right"></i> <span style="margin-left: 5px">Logout</span></a>
                    </div>
                </div>
                <div class="col-10">
                 <h1>Order</h1>
                </div>
            </div>
        </div>
    </section>
@endsection
