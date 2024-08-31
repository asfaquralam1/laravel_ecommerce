@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.sidebar')
        </div>
        <div class="col-10">
            <a href="{{ route('admin.logout') }}" style="background-color: green;color: white;">Logout</a>
        </div>
    </div>
@endsection
