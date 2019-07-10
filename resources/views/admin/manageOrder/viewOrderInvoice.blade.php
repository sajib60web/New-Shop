@extends('admin.master')

@section('title')
View Order Details
@endsection

@section('mainContent')
<style type="text/css">
    *{
        border: 0;
        box-sizing: content-box;
        color: inherit;
        font-family: inherit;
        font-size: 16px;
        font-style: inherit;
        font-weight: inherit;
        line-height: inherit;
        list-style: none;
        margin: 0;
        padding: 0;
        text-decoration: none;
        vertical-align: top;
    }
    h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }
    /* table */
    table { font-size: 75%; table-layout: fixed; width: 100%; }
    table { border-collapse: separate; border-spacing: 2px; }
    th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
    th, td { border-radius: 0.25em; border-style: solid; }
    th { background: #EEE; border-color: #BBB; }
    td { border-color: #DDD; }
    /* page */
    .abc { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 9.5in; }
    .abc { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }
    /* header */
    .hed { margin: 0 0 3em; }
    .hed:after { clear: both; content: ""; display: table; }
    .hed h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
    .hed address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
    .hed address p { margin: 0 0 0.25em; }
    .hed span, header img { display: block; float: right; }
    .hed span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
    .hed img { max-height: 100%; max-width: 100%; }
    .hed input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }
    /* article */
    article, article address, table.meta, table.inventory { margin: 0 0 3em; }
    article:after { clear: both; content: ""; display: table; }
    article h1 { clip: rect(0 0 0 0); position: absolute; }
    article address { float: left; font-size: 125%; font-weight: bold; }
    /* table meta & balance */
    table.meta, table.balance { float: right; width: 36%; }
    table.meta:after, table.balance:after { clear: both; content: ""; display: table; }
    /* table meta */
    table.meta th { width: 40%; }
    table.meta td { width: 60%; }
    /* table items */
    table.inventory { clear: both; width: 100%; }
    table.inventory th { font-weight: bold; text-align: center; }
    table.inventory td:nth-child(1) { width: 26%; }
    table.inventory td:nth-child(2) { width: 38%; }
    table.inventory td:nth-child(3) { text-align: right; width: 12%; }
    table.inventory td:nth-child(4) { text-align: right; width: 12%; }
    table.inventory td:nth-child(5) { text-align: right; width: 12%; }
    /* table balance */
    table.balance th, table.balance td { width: 50%; }
    table.balance td { text-align: right; }
    /* aside */
    aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
    aside h1 { border-color: #999; border-bottom-style: solid; }
    /* javascript */
    .h2, h2 {
        font-size: 24px;
    }
</style>
<!-- page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Order Invoice</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel abc">
                <header class="hed">
                    <h1>Invoice</h1>
                    <address>
                        <h2>Shipping Information</h2>
                        <p>{{$shipping->full_name}}</p>
                        <p>{{$shipping->address}}</p>
                        <p>{{$shipping->phone_number}}</p>
                    </address>
                    <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
                </header>
                <header>
                    <address>
                        <h2>Customer Information</h2>
                        <p>{{ $customer->first_name . ' ' . $customer->last_name }}</p>
                        <p>{{ $customer->phone_number }}</p>
                        <p>{{ $customer->address }}</p>
                        <p>{{ $customer->email_address }}</p>
                    </address>
                </header>
                <article>
                    <address>
                        <p>Some Company<br>c/o Some Guy</p>
                    </address>
                    <table class="meta">
                        <tr>
                            <th><span >Invoice #</span></th>
                            <td><span >0000{{ $orders->id }}</span></td>
                        </tr>
                        <tr>
                            <th><span >Date</span></th>
                            <td><span >{{ $orders->created_at }}</span></td>
                        </tr>
                        <tr>
                            <th><span >Amount Due</span></th>
                            <td><span id="prefix">Tk : </span><span>{{$orders->order_total}}</span></td>
                        </tr>
                    </table>
                    <table class="inventory">
                        <thead>
                            <tr>
                                <th><span>Item</span></th>
                                <th><span>Description</span></th>
                                <th><span>Rate</span></th>
                                <th><span>Quantity</span></th>
                                <th><span>Price</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($sum=0)
                            @foreach($orderDetail as $v_orderDetail)
                            <tr>
                                <td><span >{{$v_orderDetail->product_name}}</span></td>
                                <td><span >Experience Review</span></td>
                                <td><span data-prefix>Tk : </span><span >{{$v_orderDetail->new_price}}</span></td>
                                <td><span >{{$v_orderDetail->quantity}}</span></td>
                                <td><span data-prefix>Tk : </span><span>{{$total = $v_orderDetail->new_price*$v_orderDetail->quantity}}</span></td>
                            </tr>
                            @php($sum = $sum + $total)
                            @endforeach
                        </tbody>
                    </table>
                    <table class="balance">
                        <tr>
                            <th><span >Total</span></th>
                            <td><span data-prefix>Tk : </span><span>{{ $sum }}</span></td>
                        </tr>
                    </table>
                </article>
                <aside>
                    <h1><span >Additional Notes</span></h1>
                    <div>
                        <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
@endsection



