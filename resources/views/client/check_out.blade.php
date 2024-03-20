@extends('layouts.master')
@section('main')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Billing address</h3>
                    </div>
                    <form class="needs-validation" action="" novalidate method="post">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{$auth->id}}">
                    <input type="hidden" name="total_price" value="{{$cart->totalPrice}}">
                        <div class="mb-3">
                            <label for="username">Username *</label>
                            <div class="input-group">
                                <input type="text" value="{{$auth->name}}" name="auth_name" class="form-control" id="username"
                                    placeholder="" required>
                                <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email Address *</label>
                            <input type="email" value="{{$auth->email}}"  name="auth_email" class="form-control" id="email" placeholder="">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Phone *</label> 
                            <input type="text" value="{{$auth->phone}}"  name="auth_phone" class="form-control" id="email"
                                placeholder="">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Address *</label>
                            <input type="text" value="{{$auth->address}}" name="auth_address" class="form-control" id="address"
                                placeholder="">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <hr class="mb-4">
                        <h4>
                            <input type="checkbox"  id="is_me"> <small><label for="is_me"> Use My Infor</label></small>
                        </h4>
                        <div class="form-send">
                            <div class="mb-3 ">
                                <input type="text"  class="form-control" name="name" placeholder="Please enter name *" required data-error="Please enter your name" style="color:black;">
                                @error('name') <small style="color: red">{{ $message }}</small> @enderror

                            </div>

                            <div class="mb-3">
                                <input type="email"  class="form-control" name="email" placeholder="Please enter email *" required data-error="Please enter your email" style="color:black;">
                                @error('email') <small style="color: red">{{ $message }}</small> @enderror

                            </div>

                            <div class="mb-3">
                                <input type="text"  class="form-control" name="phone" placeholder="Please enter phone *" required data-error="Please enter your phone" style="color:black;">
                                @error('phone') <small style="color: red">{{ $message }}</small> @enderror

                            </div>
                            
                            <div >
                                <input type="text"  class="form-control" name="address" placeholder="Please enter address *" required data-error="Please enter your address" style="color:black;">
                                @error('address') <small style="color: red">{{ $message }}</small> @enderror

                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="" style="float:right;">
                            <a href="{{route('cart.view')}}" class="btn btn-hover btn-danger mr-2 " >Back</a>
                            <button type="submit" class="mr-auto btn btn-success" style="background:#b0b435;border:none;"><i class="far fa-shopping-basket"></i> PlaceOrder</button>
                        </div>
                       
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="shipping-method-box">
                            <div class="title-left">
                                <h3>Shipping Method</h3>
                            </div>
                            <div class="mb-4">
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption1" name="shipping-option" class="custom-control-input"
                                        checked="checked" type="radio">
                                    <label class="custom-control-label" for="shippingOption1">Standard Delivery</label>
                                    <span class="float-right font-weight-bold">FREE</span>
                                </div>
                                <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption2" name="shipping-option" class="custom-control-input"
                                        type="radio">
                                    <label class="custom-control-label" for="shippingOption2">Express Delivery</label>
                                    <span class="float-right font-weight-bold">$10.00</span>
                                </div>
                                <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption3" name="shipping-option" class="custom-control-input"
                                        type="radio">
                                    <label class="custom-control-label" for="shippingOption3">Next Business day</label>
                                    <span class="float-right font-weight-bold">$20.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Shopping cart</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                @foreach($cart->items as $carts)
                                <div class="media mb-2 border-bottom">
                                    <div class="media-body"> <a
                                            href="{{route('client.shop_detail',['id' => $carts['id'],'slug' => Str::slug($carts['name'])])}}">{{$carts['name']}}</a>
                                        <img src="{{URL::asset('uploads')}}/{{$carts['image']}}" width="80px"
                                            height="80px" style="float:right;padding-bottom:10px; object-fit:cover">
                                        <div class="small text-muted">Price: ${{number_format($carts['price'])}} <span
                                                class="mx-2">|</span> Quantity: {{$carts['quantity']}} <span
                                                class="mx-2">|</span> Subtotal:
                                            ${{number_format($carts['quantity']* $carts['price'])}}

                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>TotalQuantity</h4>
                                <div class="ml-auto font-weight-bold"> {{$cart->totalQuantity}} items </div>
                            </div>
                            <div class="d-flex">
                                <h4>Total Product</h4>
                                <div class="ml-auto font-weight-bold"> {{$cart->totalItem}} Product </div>
                            </div>
                            <div class="d-flex">
                                <h4>Discount</h4>
                                <div class="ml-auto font-weight-bold"> $ 40.00 </div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold"> $ 10.00 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Tax</h4>
                                <div class="ml-auto font-weight-bold"> $ 2.00 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> $ {{number_format($cart->totalPrice, 2)}}</div>
                            </div>
                            <hr>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-01.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-02.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-03.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-04.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-06.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-07.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-08.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-09.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{URL::asset('master')}}/images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Instagram Feed  -->

@stop()
@section('js')
    <script >
        $('#is_me').click(function(){
            var checked = $(this).is(':checked');
            if(checked){
                var _name = $('input[name="auth_name"]').val();
                var _email= $('input[name="auth_email"]').val();
                var _phone = $('input[name="auth_phone"]').val();
                var _address = $('input[name="auth_address"]').val();
                $('input[name="name"]').val(_name);
                $('input[name="email"]').val(_email);
                $('input[name="phone"]').val(_phone);
                $('input[name="address"]').val(_address);
            }else{
                $('input[name="name"]').val('');
                $('input[name="email"]').val('');
                $('input[name="phone"]').val('');
                $('input[name="address"]').val('');
            }
        });
        
    </script>
@stop()