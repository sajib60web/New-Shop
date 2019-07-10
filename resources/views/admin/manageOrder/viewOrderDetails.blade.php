@extends('admin.master')

@section('title')
View Order Details
@endsection

@section('mainContent')
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Order Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Order Details info For this Order</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Customer info For this Order</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Shipping info For this Order</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Payment info For this Order</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{$payment->payment_type}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$payment->payment_status}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success">Product info For this Order</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                     
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
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{$v_orderDetail->product_id}}</td>
                                <td>{{$v_orderDetail->product_name}}</td>
                                <td>{{$v_orderDetail->new_price}}</td>
                                <td>{{$v_orderDetail->quantity}}</td>
                                <td>{{$v_orderDetail->new_price*$v_orderDetail->quantity}}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
@endsection