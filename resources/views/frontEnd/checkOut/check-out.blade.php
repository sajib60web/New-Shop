@extends('frontEnd.master')

@section('title')
Check Out
@endsection

@section('mainContent')
<!--banner-->
<div class="banner1">
    <div class="container">
        <h3><a href="{{route('/')}}">Home</a> / <span>Check Out</span></h3>
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
                    <h2 class="text text-success text-center">You have to login Compalete you Valuable Order.If you are not then please register first</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 well">
                        <div class="form-w3agile form1">
                            <h3>Register</h3>
                            {{ Form::open(['route'=>'customer-register', 'method' =>'POST']) }}
                            <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input  type="text" name="first_name" placeholder="Frist Name">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input  type="text" name="last_name" placeholder="Last Name">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" name="email_address" placeholder="E-mail Address"/>
                                <span class="text-success" id="mailCheck"></span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" name="password" placeholder="Password"/>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="text" name="phone_number" placeholder="Phone Number"/>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="text" name="address" placeholder="Address"/>
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" name="btn" value="Sign Up">
                            {{ Form::close() }}
                        </div>
                    </div>
                    <div class="col-md-6 well">
                        <div class="form-w3agile form1">
                            <h3>Login</h3>
                            <h4 style="color: red">{{ Session::get('massage')}}</h4>
                            <br>
                            {{ Form::open(['route'=>'customer-login', 'method' =>'POST']) }}
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" name="email_address" placeholder="E-mail Address"/>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password"  name="password" placeholder="Password"/>
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" name="btn" value="Login">
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
<script>
    var email_address = document.getElementById('email_address');
    email_address.onblur = function () {
        var xmlhttp = new XMLHttpRequest();
        var email = document.getElementById('email_address').value;
        var serverPage = 'http://localhost/NewShop1/public/ajax-email-check/' + email;
        xmlhttp.open('GET', serverPage);
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mailCheck").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.send(null);
    }
</script>
@endsection

