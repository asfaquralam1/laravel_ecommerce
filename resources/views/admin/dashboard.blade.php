@extends('admin.master')
@section('page_title', 'Dashboard')
@section('dashboard_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.sidebar')
        </div>
        <div class="col-10">
            <h1>Dashboard</h1>
        </div>
    </div>
@endsection
