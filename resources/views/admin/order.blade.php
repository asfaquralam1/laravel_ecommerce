@extends('admin.master')
@section('page_title', 'Add Category')
@section('category_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.sidebar')
        </div>
        <div class="col-10">
            <form action="" id="myForm">
                @csrf
                <div class="from-group">
                    <label for="">Select Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="from-group">
                    <label for="">Order Name</label>
                    <input type="text" name="order_name" class="form-control">
                </div>
                <button id="submit" class="btn btn-success">Add Order</button>
            </form>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            console.log("hi");
            $.ajax({
                url: "{{ url('addorder') }}",
                type: "post",
                dataType: "json",
                data: $('#myForm').serialize(),
                success: function(response) {
                    console.log(response);

                }
            })
        })
    })
</script>
