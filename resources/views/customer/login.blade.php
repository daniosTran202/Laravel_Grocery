@extends('layouts.master')
@section('main')
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Login</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Login </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2 class="text-center mb-5"> FreshShop |  Login</h2>

                        {{-- @if(Session::has('no'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{Session::get('no')}}
                            </div>
                        @endif --}}
                        <form method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email"  class="form-control" id="name" name="email" placeholder="Enter Email" data-error="Please enter your name">

                                        @error('email') <small style="color: red">{{ $message }}</small> @enderror

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                <label for="">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="subject" name="password" placeholder="Enter password" data-error="Please enter your Email">
                                        @error('password') <small style="color: red">{{ $message }}</small> @enderror

                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox" value="1" id="flexCheckChecked" >
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Remember
                                    </label>
                                    <a href="{{route('customer.forgot_password')}}"  style="float:right;">Forgot password ?</a>
                                </div>
                                </div>
                                

                                <div class="col-md-12 mt-2">
                                    <div class="submit-button" style="text-align: right">
                                        <button class="btn hvr-hover" style="margin-right: 15px"><a href="{{route('customer.register')}}" style="color: #fff">Register</a></button>
                                        <button class="btn hvr-hover"  type="submit">Login</button>
                                        <div  class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>LOGIN INFO</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 9000 <br>Preston Street Wichita,<br> KS 87213 </p>
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
    <!-- End Cart -->

@stop()