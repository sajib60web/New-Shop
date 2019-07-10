<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    @if(Session::get('customerId') && Session::get('shippingId'))
                    <li><a href="{{route('checkOut-payment')}}">Checkout</a></li>
                    @elseif(Session::get('customerId'))
                    <li><a href="{{route('checkOut-shipping')}}">Checkout</a></li>
                    @else
                    <li><a href="{{route('check-out')}}">Checkout</a></li>
                    @endif
                    @if(Session::get('customerId'))
                    <li><a href="{{route('customer-logout')}}">LogOut</a></li>
                    @else
                    <li><a href="{{route('new-customer-login')}}">Login</a></li>
                    @endif
                    <?php
                    $customerName = Session::get('customerName');
                    if ($customerName != NULL) {
                        ?>
                        <li><a href="">{{Session::get('customerName')}}</a></li>
                    <?php } else { ?>
                        <li><a href="{{route('new-customer-login')}}">Create Account</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{route('/')}}">New Shop <span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div> 
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{route('/')}}" class="act">Home</a></li>
                                @foreach($categories as $category)
                                <li><a href="{{route('category-product',['id'=>$category->id])}}">{{$category->category_name}}</a></li>
                                @endforeach
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                    <ul class="cd-header-buttons">
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="#" method="post">
                            <input name="Search" type="search" placeholder="Search...">
                        </form>
                    </div>	
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="{{asset('show-cart')}}">
                            <h3> <div class="total">
                                    <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                                <img src="{{asset('show-cart')}}/frontEnd/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
                    </div>	
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--header-->

