<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - fundaofwebit.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <br/>
    <br/>
    <table class="table table-bordered">
        <thead>
            <th>Date</th>
            <th>Total Amount</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ date('d-m-Y', strtotime( $order->created_at)) }}</td>
                    <td>{{ $order->grand_total }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
                @endforeach
        </tbody>
    </table>

</body>
</html>
