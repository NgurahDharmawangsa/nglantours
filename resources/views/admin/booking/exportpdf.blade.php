<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;">Laporan Booking</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Packages</th>
            <th>Telp Number</th>
            <th>Booking Date</th>
            <th>Participants</th>
            <th>Total Price</th>
            <th>Payment Method</th>
            <th>Status</th>
        </tr>
        @foreach ($booking as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->packages->name }}</td>
                <td>{{$item->number}}</td>
                <td>{{\Carbon\Carbon::parse($item->booking_date)->format('j F, Y')}}</td>
                <td>{{$item->participants}}</td>
                <td>Rp. {{number_format($item->total_price)}}</td>
                <td>{{$item->payment_method}}</td>
                <td>{{$item->status}}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
