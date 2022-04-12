@extends('layouts.master')
@section('main')
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Register</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Register </li>
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
                        <h2>Register</h2>
                        <p> Create An Account for shopping , convenient and useful </p>
                        <form  method="POST" action="">@csrf
                        
                            <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Email</label>
                                        <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Address</label>
                                        <input type="text" class="form-control" id="subject" name="address" placeholder=" Your Address">
                                      
                                    </div>
                                </div>
                            </div>
                              
                                <div class="col-md-6">

                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Phone</label>
                                        <input type="text" placeholder="Your Phone" id="phone" class="form-control" name="phone" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Password</label>
                                        <input type="password" placeholder="Your Password" id="phone" class="form-control" name="password">
                                    </div>
                                    <div class="form-group mt-2">
                                    <label for="">Confirm Password</label>
                                        <input type="password" placeholder="Your Confirm Password" id="phone" class="form-control" name="confirm_password">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Gender</label>
                                        <div class="radio">
                                            <label  class="mr-2">
                                                <input type="radio" name="gender" value="1"> Male
                                            </label>
                                            <label>
                                                <input type="radio" name="gender" value="0" > Female
                                            </label>
                                    </div>
                                </div>
                              
                                   <div class=" text-center mt-5">
                                        <button class="btn "  style="background-color:#b0b435;" type="submit">Register</button>
                                    </div>
              
                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
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