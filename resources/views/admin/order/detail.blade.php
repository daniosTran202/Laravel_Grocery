@extends('layouts.admin')
@section('title','Order Details')
@section('main')
<div class="cart-box-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-6">
                <h1 class="text-center">Order Information</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Created_at</th>
                            <td>{{$order->created_at->format('d-m-y')}}</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td> $ {{number_format($order->total_price)}}</td>
                        </tr>
                        <tr> 
                            <th>Status</th>
                            <td>
                                <form action="{{route('admin.order.status', $order->id)}}" method="post" class="form-inline" role="form">
                                @csrf

                                @if($order->status == 0)
                                    <a class="btn btn-primary">Chờ Xác Nhận</a>
                                @elseif($order->status == 1)
                                    <a class="btn btn-warning">Đã Xác Nhận</a>
                                @elseif($order->status == 2)
                                    <a class="btn btn-danger">Đang Giao Hàng</a>
                                @elseif($order->status == 3)
                                    <a class="btn btn-success">Đã Giao Hàng</a>
                                @else
                                    <a class="btn btn-danger">Đã Hủy</a>
                                @endif

                                @if($order->status != 3)
                                  <div class=" ml-2 form-group">
                                    <select class="form-control" name="status" required="required">
                                      <option value="">Chọn Trạng Thái</option>
                                      <option value="2">Đang Giao Hàng</option>
                                      <option value="3">Đã Giao Hàng</option>
                                      <option value="4">Đã Hủy</option>
                                    </select>
                                  </div>

                                <button type="submit" class="btn btn-primary ml-1">Cập Nhật</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <h2 class="text-center">Orderer</h2>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td>{{$order->cus->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$order->cus->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$order->cus->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$order->cus->address}}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Receiver</h2>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td>{{$order->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 Class="text-center">Product Details</h1>
                <div class="table-main table-responsive">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $item)
                            <tr>
                                <th>{{$item->prod->id}}</th>
                                <th>{{$item->prod->name}}</th>
                                <th>{{$item->price}}</th>
                                <th>{{$item->quantity}}</th>
                                <th>{{number_format($item->price * $item->quantity)}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>

        <a href="{{route('order.index')}}" class="btn btn-danger " style="float:right;">Back</a>
    </div>

    @stop