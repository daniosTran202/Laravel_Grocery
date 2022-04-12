@extends('layouts.master')
@section('main')
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-6">
                <h1 class="text-center">Order Information</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td>#{{$order->id}}</td>
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
                            <td> @if($order->status == 0)
                                    <a class="">Chờ Xác Nhận</a>
                                @elseif($order->status == 1)
                                    <a class="">Đã Xác Nhận</a>
                                @elseif($order->status == 2)
                                    <a class="">Đang Giao Hàng</a>
                                @elseif($order->status == 3)
                                    <a class="">Đã Giao Hàng</a>
                                @else
                                    <a class="">Đã Hủy</a>
                                @endif</td>
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
                                <th> $ {{$item->price}}</th>
                                <th>{{$item->quantity}}</th>
                                <th>$ {{number_format($item->price * $item->quantity)}}</th>
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
    </div>

    @stop