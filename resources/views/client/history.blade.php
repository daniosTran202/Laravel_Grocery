@extends('layouts.master')
@section('main')
<!-- Start Cart  -->
<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table text-center table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Created_at</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as  $order) 
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->created_at->format('d-m-y')}}</td>
                                    <td>{{number_format($order->total_price)}}</td>
                                    <td>{{$order->status == 0 ? 'Pending...' :'Accepted' }}</td>
                                    <td class="text-right">
                                        <a href="{{route('order.detail', $order->id)}}" class="btn btn-success">Detail</a>
                                        <a href="{{route('order.pdf', $order->id)}}" target="_blank"  class="btn btn-primary">PDF</a>
                                        <a href="{{route('order.pdf', $order->id)}}?action=download" target="_blank"  class="btn btn-danger">Dowload PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-center">
                            {{$orders->links()}}
                        </div>
                       </div> 
                    </div>
                </div>
            </div>
            
@stop