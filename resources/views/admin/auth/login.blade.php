@extends('admin.master')
@section('page_title', 'Login')
@section('login_select', 'active')
@section('container')
<div class="login-form-section" style="background-image: url({{ asset('image/3165.jpg') }})">
        <form class="login-form" action="{{route('admin.authenticate')}}" method="post">
            @csrf
            <h1 class="login-heading">Login</h1>
            <div class="mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}" name="email" id="email" placeholder="Useremail">
                @error('email')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                @error('password')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 form-check" style="display: flex;justify-content:space-between">
                <div>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="background-color: white">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <a href="" style="color: white;">Forget Password</a>
            </div>
            <button type="submit" class="btn btn-primary login-btn">Login</button>

            <p class="register-text">Dont have account? <a href=""
                    style="color: white;font-weight: bold">Register</a></p>
        </form>
    </div>
@endsection