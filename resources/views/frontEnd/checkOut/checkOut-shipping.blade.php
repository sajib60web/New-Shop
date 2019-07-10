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
                    <h2 class="text text-success text-center">  Dr : {{Session::get('customerName')}} .You have to give us Product Shipping info to compalate to Order.</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 well">
                        <div class="form-w3agile form1">
                            <h3>Shipping Information</h3>
                            {{ Form::open(['route'=>'new-shipping', 'method' =>'POST']) }}
                            <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input  type="text" value="{{$customer->first_name . '' . $customer->last_name}}" name="full_name" placeholder="Full Name">
                                <input  type="hidden" value="{{$customer->id}}" name="shippingId" placeholder="Full Name">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" value="{{$customer->email_address}}" name="email_address" placeholder="E-mail Address"/>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="text" value="{{$customer->phone_number}}" name="phone_number" placeholder="Phone Number"/>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="text" value="{{$customer->address}}" name="address" placeholder="Address"/>
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" name="btn" value="Save Shipping Information">
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
@endsection

