@extends('admin.master')
@section('page_title', 'Order')
@section('order_select', 'active')
@section('container')
<div class="row">
    <div class="col-2">
        @include('admin.partials.sidebar')
    </div>
    <div class="col-10">
        <div class="header_card">
            <i class="fas fa-bars"></i>
            <p><i class="fas fa-user"></i>{{ auth()->user() ? auth()->user()->name : '' }}</p>
        </div>
        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Grand Total</th>
                    <th>Tarnsection Id</th>
                    <th>Shiping</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ date('d-m-Y', strtotime( $order->created_at)) }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->grand_total }}</td>
                    <td>{{ $order->transaction_id }}</td>
                    <td>{{ $order->shipping }}</td>
                    <td>{{ $order->status }}</td>
                    <td>Edit</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('addorder') }}",
type: "POST",
dataType: "json",
data: $('#myForm').serialize(),
success: function(response) {
console.log(response);

}
})
})
})
</script> --}}
