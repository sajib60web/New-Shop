@extends('admin.master')

@section('title')
Manage Order
@endsection

@section('mainContent')
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Order</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php
    $massage = Session::get('massage');
    if (isset($massage)) {
        ?>
        <div class="alert alert-block alert-success fade in">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <h4 class="alert-heading">Success!</h4>
            <p><?php echo $massage; ?></p>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Manage Order</div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($orders as $order)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{route('view-order-details',['id'=>$order->id])}}" title="View Order Details">
                                        <i class="glyphicon glyphicon-zoom-in"></i>
                                    </a>

                                    <a class="btn btn-warning btn-xs" href="{{route('view-order-invoice',['id'=>$order->id])}}" title="View Order Invoice">
                                        <i class="glyphicon glyphicon-zoom-out"></i>
                                    </a>
                                    <a class="btn btn-primary  btn-xs" href="{{route('download-order-invoice',['id'=>$order->id])}}" title="Download Order Invoice">
                                        <i class="glyphicon glyphicon-download"></i>
                                    </a>
                                    <a class="btn btn-success btn-xs" href="{{route('edit-order',['id'=>$order->id])}}" title="Edit Order">

                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="{{route('delete-order',['id'=>$order->id])}}" title="Delete Order" onclick="return confirm('Are You Sure to Delete');">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
@endsection

