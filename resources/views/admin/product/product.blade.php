@extends('admin.master')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')
    <h1>Product</h1>
    <button><a href="{{ route('admin.delete-category') }}">Delete</a></button>
@endsection
