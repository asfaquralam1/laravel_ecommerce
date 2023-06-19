@extends('admin.layout')

@section('container')
{{ session('message')}}
<h1 class="mb-10">Category</h1>

<a href="manage-category">
    <button type="button" class="btn btn-success">Add Catagory</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>Mobile</td>
                        <td>iPhone X 64Gb Grey</td>
                        <td>$999.00</td>
                    </tr>
                        <td>2018-09-22 00:43</td>
                        <td>Computer</td>
                        <td>Macbook Pro Retina 2017</td>
                        <td class="process">Processed</td>
                        <td>$10.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection