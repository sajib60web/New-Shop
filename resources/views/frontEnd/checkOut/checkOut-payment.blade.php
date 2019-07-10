@extends('frontEnd.master')

@section('title')
CheckOut Shipping
@endsection

@section('mainContent')
<!--banner-->
<div class="banner1">
    <div class="container">
        <h3><a href="{{route('/')}}">Home</a> / <span>CheckOut Shipping</span></h3>
    </div>
</div>
<!--banner-->
<!--content-->
<div class="content">
    <!--single-->
    <div class="single-wl3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 well">
                    <h2 class="text text-success text-center">  Dr : {{Session::get('customerName')}} .You have to give us Product Payment method.....</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 well">
                        {{ Form::open(['route'=>'new-order', 'method' =>'POST']) }}
                        <table class="table table-bordered">
                            <tr>
                                <th>Cash On Delivery</th>
                                <td><input type="radio" name="payment_type" value="Cash" />Cash On Delivery</td>
                            </tr>
                            <tr>
                                <th>Paypal</th>
                                <td><input type="radio" name="payment_type" value="Paypal" />Paypal</td>
                            </tr>
                            <tr>
                                <th>Bkash</th>
                                <td><input type="radio" name="payment_type" value="Bkash" />Bkash</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" name="btn" value="Confirm Order" /></td>
                            </tr>
                        </table>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
@endsection



