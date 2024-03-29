@extends('frontEnd.master')

@section('title')
Product Details
@endsection

@section('mainContent')
<!--banner-->
<div class="banner1">
    <div class="container">
        <h3><a href="{{route('/')}}">Home</a> / <span>Product Detail</span></h3>
    </div>
</div>
<!--banner-->

<!--content-->
<div class="content">
    <!--single-->
    <div class="single-wl3">
        <div class="container">
            <div class="single-grids">
                <div class="col-md-9 single-grid">
                    @foreach($categoryProducts as $categoryProduct)
                    <div clas="single-top">
                        <div class="single-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="{{asset($categoryProduct->product_image)}}">
                                        <div class="thumb-image"> <img src="{{asset($categoryProduct->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>
                                    <li data-thumb="{{asset($categoryProduct->product_image)}}">
                                        <div class="thumb-image"> <img src="{{asset($categoryProduct->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>
                                    <li data-thumb="{{asset($categoryProduct->product_image)}}">
                                        <div class="thumb-image"> <img src="{{asset($categoryProduct->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="single-right simpleCart_shelfItem">
                            <h4>{{ $categoryProduct->product_name }}</h4>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <p class="price item_price">Tk : {{ $categoryProduct->new_price }}</p>
                            <div class="description">
                                <p><span>Quick Overview : </span>{{ $categoryProduct->short_description }}</p>
                            </div>
                            {{ Form::open(['route'=>'add-to-cart', 'method' =>'POST']) }}
                            <div class="color-quality">
                                <h6>Quantity :</h6>
                                <div class="quantity"> 
                                    <input type="number" name="qty" value="1" min="1" />
                                    <input type="hidden" name="id" value="{{ $categoryProduct->id }}"/>
                                </div>
                            </div>
                            <div class="women">
                                <span class="size">XL / XXL / S </span>
                                <input class="my-cart-b item_add" type="submit" name="btn" value="Add To Cart" />
                            </div>
                            {{ Form::close() }}
                            <div class="social-icon">
                                <a href="#"><i class="icon"></i></a>
                                <a href="#"><i class="icon1"></i></a>
                                <a href="#"><i class="icon2"></i></a>
                                <a href="#"><i class="icon3"></i></a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3 single-grid1">
                    <h3>Recent Products</h3>
                    <div class="recent-grids">
                        <div class="recent-left">
                            <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r.jpg" alt=""></a>	
                        </div>
                        <div class="recent-right">
                            <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <span class=" price-in1"> $ 29.00</span>
                        </div>	
                        <div class="clearfix"> </div>
                    </div>
                    <div class="recent-grids">
                        <div class="recent-left">
                            <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r1.jpg" alt=""></a>	
                        </div>
                        <div class="recent-right">
                            <h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <span class=" price-in1"> $ 19.00</span>
                        </div>	
                        <div class="clearfix"> </div>
                    </div>
                    <div class="recent-grids">
                        <div class="recent-left">
                            <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r2.jpg" alt=""></a>	
                        </div>
                        <div class="recent-right">
                            <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <span class=" price-in1"> $ 19.00</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="recent-grids">
                        <div class="recent-left">
                            <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r3.jpg" alt=""></a>	
                        </div>
                        <div class="recent-right">
                            <h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div> 
                            <span class=" price-in1">$ 45.00</span>
                        </div>	
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--Product Description-->
            <div class="product-w3agile">
                <h3 class="tittle1">Product Description</h3>
                <div class="product-grids">
                    <div class="col-md-4 product-grid">
                        <div id="owl-demo" class="owl-carousel">
                            <div class="item">
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1"> $ 29.00</span>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r1.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1"> $ 19.00</span>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r2.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1"> $ 19.00</span>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r3.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1">$ 45.00</span>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r4.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1"> $ 29.00</span>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r5.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1"> $ 19.00</span>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r2.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1"> $ 19.00</span>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="{{asset('/')}}/frontEnd/images/r3.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <span class=" price-in1">$ 45.00</span>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                        <img class="img-responsive " src="{{asset('/')}}/frontEnd/images/woo2.jpg" alt="">
                    </div>
                    <div class="col-md-8 product-grid1">
                        <div class="tab-wl3">
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                                    <li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        @foreach($categoryProducts as $categoryProduct)
                                        <div class="descr">
                                            <h4>{{ $categoryProduct->product_name}}</h4>
                                            <p>{{ $categoryProduct->long_description }}</p>
                                            <p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                            <div class="video">
                                                <iframe src="https://player.vimeo.com/video/22158502" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                            <ul>
                                                <li> Twin button front fastening</li>
                                                <li> Length:65cm</li>
                                                <li> Regular fit</li>
                                                <li> Notched lapels</li>
                                                <li> Internal pockets</li>
                                                <li> Centre-back vent </li>
                                                <li> Material : Outer: 40% Linen &amp; 40% Polyamide; Body Lining: 100% Cotton; Lining: 100% Acetate</li>
                                            </ul>
                                            <p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
                                        <div class="descr">
                                            <div class="reviews-top">
                                                <div class="reviews-left">
                                                    <img src="{{asset('/')}}/frontEnd/images/men3.jpg" alt=" " class="img-responsive">
                                                </div>
                                                <div class="reviews-right">
                                                    <ul>
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
                                                    </ul>
                                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="reviews-bottom">
                                                <h4>Add Reviews</h4>
                                                <p>Your email address will not be published. Required fields are marked *</p>
                                                <p>Your Rating</p>
                                                <div class="block">
                                                    <div class="starbox small ghosting"><div class="positioner"><div class="stars"><div class="ghost" style="width: 42.5px; display: none;"></div><div class="colorbar" style="width: 42.5px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div>
                                                </div>
                                                <form action="#" method="post">
                                                    <label>Your Review </label>
                                                    <textarea type="text" Name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = 'Message...';
                                                            }" required="">Message...</textarea>
                                                    <div class="row">
                                                        <div class="col-md-6 row-grid">
                                                            <label>Name</label>
                                                            <input type="text" value="Name" Name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                        this.value = 'Name';}" required="">
                                                        </div>
                                                        <div class="col-md-6 row-grid">
                                                            <label>Email</label>
                                                            <input type="email" value="Email" Name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                        this.value = 'Email';
                                                                    }" required="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <input type="submit" value="SEND">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!--Product Description-->
        </div>
    </div>
    <!--single-->
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h3 class="tittle1">Best Sellers</h3>
            <div class="arrivals-grids">
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>		
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/p28.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/p27.jpg" class="img-responsive"  alt="">
                                    </div>			
                                </a>		
                            </figure>	
                        </div>
                        <div class="ribben">
                            <p>NEW</p>
                        </div>
                        <div class="ribben1">
                            <p>SALE</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                            <span class="size">XL / XXL / S </span>
                            <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                            <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>		
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/p30.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/p29.jpg" class="img-responsive"  alt="">
                                    </div>			
                                </a>		
                            </figure>	
                        </div>
                        <div class="ribben2">
                            <p>OUT OF STOCK</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                            <span class="size">XL / XXL / S </span>
                            <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                            <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>		
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/s2.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/s1.jpg" class="img-responsive"  alt="">
                                    </div>			
                                </a>		
                            </figure>	
                        </div>
                        <div class="ribben1">
                            <p>SALE</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                            <span class="size">XL / XXL / S </span>
                            <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                            <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>		
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/s4.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="{{asset('/')}}/frontEnd/images/s3.jpg" class="img-responsive"  alt="">
                                    </div>			
                                </a>		
                            </figure>	
                        </div>
                        <div class="ribben">
                            <p>NEW</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                            <span class="size">XL / XXL / S </span>
                            <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                            <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--new-arrivals-->
</div>
<!--content-->
@endsection
