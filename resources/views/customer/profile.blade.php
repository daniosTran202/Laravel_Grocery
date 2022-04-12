@extends('layouts.master')
@section('main')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Information</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Information </li>
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
                    <h2 class="text-center">Information Customer</h2>
                    <form method="POST" action="">@csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" value="{{$prof->name}}" id="name"
                                            name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" placeholder="Your Email" value="{{$prof->email}}" id="email"
                                            class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" id="subject" value="{{$prof->address}}"
                                            name="address" placeholder=" Your Address">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" placeholder="Your Phone" id="phone" value="{{$prof->phone}}"
                                            class="form-control" name="phone">
                                    </div>
                                </div>


                                <div class="alert alert-primary">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <strong>Notice:</strong> Password is optional !
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" placeholder="Your Password" id="phone"
                                            class="form-control" name="password">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="">Confirm Password</label>
                                        <input type="password" placeholder="Your Confirm Password" id="phone"
                                            class="form-control" name="confirm_password">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Gender</label>
                                    <div class="radio">
                                        <label class="mr-2">
                                            <input type="radio" name="gender" value="1"
                                                {{$prof->gender == 1 ? 'checked' :'' }}> Male
                                        </label>
                                        <label>
                                            <input type="radio" name="gender" value="0" value="1"
                                                {{$prof->gender == 0 ? 'checked' :'' }}> Female
                                        </label>
                                    </div>
                                </div>

                                <div class=" text-center mt-5 ml-5 ">
                                    <a href="{{route('client.home')}}" class="btn btn-danger" style="opacity:65%;"><i
                                            class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
                                    <button class="btn btn btn-primary ml-5" type="submit"><i
                                            class="fa fa-save" aria-hidden="true"> </i> Saved</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>CUSTOMERS INFO</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut
                        ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique
                        purus turpis. Maecenas vulputate. </p>
                    <ul>
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 9000 <br>Preston Street
                                Wichita,<br> KS 87213 </p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a>
                            </p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>Email: <a
                                    href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->


@stop()