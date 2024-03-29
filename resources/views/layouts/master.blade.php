<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{URL::asset('master')}}/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{URL::asset('master')}}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('master')}}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{URL::asset('master')}}/css/style.css">

    <link rel="stylesheet" href="{{URL::asset('admin_lte3')}}/plugins/toastr/toastr.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{URL::asset('master')}}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{URL::asset('master')}}/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>¥ JPY</option>
							<option>$ USD</option>
							<option>€ EUR</option>
						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            @if(auth()->guard('cus')->check())
                            <li><a href="{{route('customer.profile')}}"><i class="fa fa-user-shield s_color"></i> {{auth()->guard('cus')->user()->name}}</a></li>
                            <li><a href="{{route('customer.logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            <li><a href="{{route('order.history')}}"><i class="fas fa-cart-arrow-down"></i> My Ordered</a></li>

                        @else
                            <li><a href="{{route('customer.login')}}"><i class="fa fa-sign-in-alt "></i> Login</a></li>
                            <li><a href="{{route('customer.register')}}"><i class="fas fa-registered"></i> Register</a></li>
                        @endif
                      
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic"  class="selectpicker form-control">
							<option  value="Register"> <a href="{{route('customer.register')}}" ><i class="fa fa-registered" aria-hidden="true">Register Here</i></a> </option>
							<option  value="Login"><a href="{{route('customer.login')}}"><i class="fa fa-user" aria-hidden="true">Login</i></a> </option>
                            
						</select>
                        
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href=""><img src="{{URL::asset('master')}}/images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{route('client.home')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('client.about')}}">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="{{route('client.shop')}}">Sidebar Shop</a></li>
                                <li><a href="{{route('cart.view')}}">Cart</a></li>
                                <li><a href="{{route('order.checkout')}}">Checkout</a></li>
                                <li><a href="{{route('customer.profile')}}">My Account</a></li>
                                <li><a href="wishlist">Wishlist</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('client.gallery')}}">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('client.contact')}}">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge">{{$cart->totalItem}}</span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    @foreach($cart->items as  $carts) 
                        <li>
                            <a href="#" class="photo"><img src="{{URL::asset('uploads')}}/{{$carts['image']}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">{{$carts['name']}} </a></h6>
                            <p>{{$carts['quantity']}} <span class="price ml-5"> $ {{number_format($carts['price'])}}</span></p>
                        </li>
                    @endforeach
                       
                        <li class="total">
                            <a href="{{route('cart.view')}}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $ {{number_format($cart->totalPrice)}}</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
       
            @yield('main')


 <!-- Start Footer  -->
 <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Business Time</h3>
							<ul class="list-time">
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Newsletter</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email Address*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{URL::asset('master')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{URL::asset('master')}}/js/popper.min.js"></script>
    <script src="{{URL::asset('master')}}/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{URL::asset('master')}}/js/jquery.superslides.min.js"></script>
    <script src="{{URL::asset('master')}}/js/bootstrap-select.js"></script>
    <script src="{{URL::asset('master')}}/js/inewsticker.js"></script>
    <script src="{{URL::asset('master')}}/js/bootsnav.js."></script>
    <script src="{{URL::asset('master')}}/js/images-loded.min.js"></script>
    <script src="{{URL::asset('master')}}/js/isotope.min.js"></script>
    <script src="{{URL::asset('master')}}/js/owl.carousel.min.js"></script>
    <script src="{{URL::asset('master')}}/js/baguetteBox.min.js"></script>
    <script src="{{URL::asset('master')}}/js/form-validator.min.js"></script>
    <script src="{{URL::asset('master')}}/js/contact-form-script.js"></script>
    <script src="{{URL::asset('master')}}/js/custom.js"></script>
    <script src="{{URL::asset('admin_lte3')}}/plugins/toastr/toastr.min.js"></script>

@if(Session::has('yes'))
  <script >
    toastr.success('{{Session::get('yes')}}', 'Your request Successful ', {timeOut: 3000})
  </script>
@endif

@if(Session::has('no'))
  <script >
    toastr.error('{{Session::get('no')}}', 'Your request Failed ', {timeOut: 3000})
  </script>
@endif

    @yield('js')
</body>

</html>