<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;

        }


        th,
        td {
            border-color: #96D4D4;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>AWB Number </th>
                <th>Order ID</th>
                <th>Courier</th>
                <th>Courier Service Weight Slab</th>
                <th>Manifest date</th>
                <th>Manifest time</th>
                <th>PaymentMode</th>
                <th>ItemPrice*</th>
                <th>CODDue</th>
                <th>Receiver Name</th>
                <th>Receiver Address 2</th>
                <th>Receiver City</th>
                <th>Receiver Pincode</th>
                <th>Receiver ContactNo.</th>
                <th>ReceiverAltContactNo</th>
                <th>ItemSKU</th>
                <th>ItemName</th>
                <th>ItemWeight (KG)</th>
                <th>ItemQty</th>
                <th>OrderType</th>
                <th>Warehouse Name</th>
                <th>Warehouse Address</th>
                <th>Warehouse Address Pin code</th>
                <th>Warehouse Contact No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookingId as $value)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td> {{ $value->awb_no }}</td>
                    <td> {{ $value->order_no }}</td>
                    <td> {{ $value->courier_name }}</td>
                    <td> {{ $value->item_weight }}</td>
                    <td> {{ \Carbon\Carbon::parse($value->created_at)->format('d, M Y') }}</td>
                    <td> {{ \Carbon\Carbon::parse($value->created_at)->format('h:iA') }}</td>
                    <td> {{ $value->payment_mode }}</td>
                    <td> {{ $value->item_price }}</td>
                    <td> {{ $value->cod_due }}</td>
                    <td> {{ $value->receiver_name }}</td>
                    <td> {{ $value->receiver_address }}</td>
                    <td> {{ $value->receiver_address_2 }}</td>
                    <td> {{ $value->receiver_state }}</td>
                    <td> {{ $value->receiver_city }}</td>
                    <td> {{ $value->receiver_pincode }}</td>
                    <td> {{ $value->receiver_contactno }}</td>
                    <td> {{ $value->receiver_alt_contactno }}</td>
                    <td> {{ $value->item_sku }}</td>
                    <td> {{ $value->item_name }}</td>
                    <td> {{ $value->item_weight }}</td>
                    <td> {{ $value->item_qty }}</td>
                    <td> {{ $value->order_type }}</td>
                    <td> {{ $value->awb_no }}</td>
                    <td> {{ $value->awb_no }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
