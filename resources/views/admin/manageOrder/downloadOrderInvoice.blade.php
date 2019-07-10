<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <meta charset="utf-8">

    </head>
    <body>
        <h2>Order Details info For this Order</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <td>{{ $orders->id }}</td>
            </tr>
            <tr>
                <th>Order Total</th>
                <td>{{ $orders->order_total }}</td>
            </tr>
            <tr>
                <th>Order Status</th>
                <td>{{ $orders->order_status }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $orders->created_at }}</td>
            </tr>
        </table>
        <h2>Customer info For this Order</h2>
        <table>
            <tr>
                <th>Customer Name</th>
                <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $customer->phone_number }}</td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td>{{ $customer->email_address }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->address }}</td>
            </tr>
        </table>
        <h2>Shipping info For this Order</h2>
        <table>
            <tr>
                <th>Full Name</th>
                <td>{{$shipping->full_name}}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{$shipping->phone_number}}</td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td>{{$shipping->email_address}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$shipping->address}}</td>
            </tr>
        </table>
        <h3>Product info For this Order</h3>
        <table>
            <tr>
                <th>SL No</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total Price</th>
            </tr>
            @php($i=1)
            @foreach($orderDetail as $v_orderDetail)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$v_orderDetail->product_id}}</td>
                <td>{{$v_orderDetail->product_name}}</td>
                <td>{{$v_orderDetail->new_price}}</td>
                <td>{{$v_orderDetail->quantity}}</td>
                <td>{{$v_orderDetail->new_price*$v_orderDetail->quantity}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>

