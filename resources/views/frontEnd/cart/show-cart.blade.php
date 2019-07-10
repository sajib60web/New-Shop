@extends('frontEnd.master')

@section('title')
Category
@endsection

@section('mainContent')
<!--banner-->
<div class="banner1">
    <div class="container">
        <h3><a href="{{route('/')}}">Home</a> / <span>Show Cart</span></h3>
    </div>
</div>
<!--banner-->
<!--content-->
<div class="content">
    <!--single-->
    <div class="single-wl3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h4 class="text-success">{{Session::get('message')}}</h4>
                    <h2 class="text-center text-success">My Shoping Cart</h2><br>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr class="bg-success text-center">
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>PriceTk :</th>
                                    <th>Quantity</th>
                                    <th>Total Price Tk :</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @php
                                $sum = 0;
                                @endphp
                                @foreach($cart_products as $cart_product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$cart_product->name}}</td>
                                    <td><img src="{{asset($cart_product->options->image)}}" height="50px" width="50px"/></td>
                                    <td>Tk : {{$cart_product->price}}</td>
                                    <td>
                                        {{ Form::open(['route'=>'cart-Update', 'method' =>'POST']) }}
                                        <input type="number" name="qty" value="{{$cart_product->qty}}" min="1"/>
                                        <input type="hidden" name="rowId" value="{{$cart_product->rowId}}"/>
                                        <input type="submit" name="btn" value="Update"/>
                                        {{ Form::close() }}
                                    </td>
                                    <td>Tk : {{$total = $cart_product->price*$cart_product->qty}}</td>
                                    <td>
                                        <a href="{{route('delete-cart-item',['rowId'=>$cart_product->rowId])}}" class="btn btn-danger btn-xs" target="Delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php $sum = $sum + $total ?>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Total (Tk.)</th>
                                <td> Tk :  {{ $sum }}</td>
                            </tr>
                            <tr>
                                <th>Vat Total (Tk.)</th>
                                <td> Tk :  {{ $vat = 0 }}</td>
                            </tr>
                            <tr>
                                <th>Grand Total (Tk.)</th>
                                <td> Tk :  {{ $orderTotal = $sum+$vat }}</td>
                            </tr>
                            <?php
                                Session::put('orderTotal', $orderTotal);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @if(Session::get('customerId') && Session::get('shippingId'))
                    <a href="{{route('checkOut-payment')}}" class="btn btn-success pull-right">Checkout</a>
                    @elseif(Session::get('customerId'))
                    <a href="{{route('checkOut-shipping')}}" class="btn btn-success pull-right">Checkout</a>
                    @else
                    <a href="{{route('check-out')}}" class="btn btn-success pull-right">Checkout</a>
                    @endif
                    <a href="{{route('/')}}" class="btn btn-success">Continue shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
@endsection

