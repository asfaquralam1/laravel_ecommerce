@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
    <h1 style="text-align: center">Dashboard {{Auth::guard('admin')->user()->email}}</h1>
    <a href="{{ route('admin.logout') }}">Logout</a>
@endsection
