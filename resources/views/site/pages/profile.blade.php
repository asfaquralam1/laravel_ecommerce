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
                    <form action="{{ route('update.profile') }}" method="post" style="background-color: rgb(241, 238, 238);border-radius: 5px;margin-bottom: 10px;padding: 20px;">
                        @csrf
                        <h4>Personal Information</h4>
                        <div class="mb-4">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"
                                id="name" placeholder="Name">
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"
                                id="email" placeholder="Email">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}"
                                id="phone" placeholder="Phone">
                            @error('phone')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" placeholder="Address">
                            @error('address')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" placeholder="City">
                            @error('city')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $user->country }}" placeholder="Country">
                            @error('country')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
