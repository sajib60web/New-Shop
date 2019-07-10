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
                    <h2 class="text text-success text-center">Googd Bay.......  Dr : {{Session::get('customerName')}}</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 well">
                        <h2>Confirm Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
@endsection

