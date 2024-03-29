@extends('layouts.master')
@section('main')
<div class="" style="width: 500px;margin:2% auto;padding:1%;border:1px solid #b0b435;border-radius:10px;">
    <div class="text-center">
      <a href="{{route('customer.login')}}" class="h1">Retrieve your password</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="" method="post">
      <input type="hidden" name="passwordNew" value="{{rand(10000,1000000)}}">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required data-error="Enter email to send confirm.">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" style="background-color:#b0b435;border:0px">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{route('customer.login')}}">Login</a>
      </p>
    </div>

    </div>


@stop()