@extends('admin.master')
@section('page_title', 'Order')
@section('order_select', 'active')
@section('container')
    <div class="row">
        <div class="col-2">
            @include('admin.sidebar')
        </div>
        <div class="col-10">
            <h1 class="text-center" style="padding-top: 20px;padding-bottom: 20px;">User Orders</h1>
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="color: white !important;text-align:center;">Date</th>
                        <th style="color: white !important;text-align:center;">Customer Name</th>
                        <th style="color: white !important;text-align:center;">Address</th>
                        <th style="color: white !important;text-align:center;">Payment Method</th>
                        <th style="color: white !important;text-align:center;">Grand Total</th>
                        <th style="color: white !important;text-align:center;">Tarnsection Id</th>
                        <th style="color: white !important;text-align:center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->created_at }}</td>
                            <td class="text-center">{{ $order->name }}</td>
                            <td class="text-center">{{ $order->address }}</td>
                            <td class="text-center">{{ $order->payment_method }}</td>
                            <td class="text-center">{{ $order->grand_total }}</td>
                            <td class="text-center">{{ $order->transaction_id }}</td>
                            <td class="text-center">{{ $order->status }}</td>
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
