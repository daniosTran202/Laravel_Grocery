@extends('layouts.admin')
@section('title','Quản lí đơn hàng')
@section('main')

<div class="container-fuild">
<div class="row">
    <div class="col-md-5">
    <a href="?status=0" class="btn btn-sm btn-outline-success"><i class="fa fa-redo-alt" aria-hidden="true"></i></a>
    @if($start && $end)
        <a href="?status=0&dateStart={{$start}}&dateEnd={{$end}}" class="btn btn-sm btn-primary">Chờ Xác Nhận</a>
        <a href="?status=1&dateStart={{$start}}&dateEnd={{$end}}" class="btn btn-sm btn-warning">Đã Xác Nhận</a>
        <a href="?status=2&dateStart={{$start}}&dateEnd={{$end}}" class="btn btn-sm btn-danger">Đang Giao Hàng</a>
        <a href="?status=3&dateStart={{$start}}&dateEnd={{$end}}" class="btn btn-sm btn-success">Đã Nhận Hàng</a>
    @else
        <a href="?status=0" class="btn btn-sm btn-primary">Chờ Xác Nhận</a>
        <a href="?status=1" class="btn btn-sm btn-warning">Đã Xác Nhận</a>
        <a href="?status=2" class="btn btn-sm btn-danger">Đang Giao Hàng</a>
        <a href="?status=3" class="btn btn-sm btn-success">Đã Nhận Hàng</a>
    @endif
    </div>

    <div class="col-md-7">
        <form action="" class="form-inline" role="form">
        <div class="form-group">
                    <div class="input-group date" id="dateStart" data-target-input="nearest">
                        <label for="">From:</label>
                        <input type="text" name="dateStart" class="form-control datetimepicker-input ml-1" data-target="#dateStart"/>
                        <div class="input-group-append" data-target="#dateStart" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Date and time -->
                <div class="form-group ml-2">
                    <div class="input-group date" id="dateEnd" data-target-input="nearest">
                    <label for="">To:</label>
                        <input type="text" name="dateEnd" class="form-control datetimepicker-input ml-1" data-target="#dateEnd"/>
                        <div class="input-group-append" data-target="#dateEnd" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary ml-2">Submit</button>
        </form>
    </div>
    </div>
</div>


<hr>
<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Created_at</th>
            <th>Total</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at->format('d-m-Y')}}</td>
            <td>{{number_format($order->total_price)}}</td>
            <td>{{$order->status == 0 ? 'Pedding...' :'Accepted' }}</td>
            <td>{{$order->cus->name}}</td>
            <td>{{$order->cus->phone}}</td>
            <td class="text-right">
                <a href="{{route('admin.order.detail', $order->id)}}" class="btn btn-success">Detail</a>
                <a href="" target="_blank" class="btn btn-primary">PDF</a>
                <a href="" target="_blank" class="btn btn-danger">Dowload PDF</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$orders->appends(request()->all())->links()}}

@stop()
@section('css')
<link rel="stylesheet" href="{{url('public/admin_lte3')}}/plugins/daterangepicker/daterangepicker.css">
@stop()
@section('js')
<script src="{{url('public/admin_lte3')}}/plugins/moment/moment.min.js"></script>
<script src="{{url('public/admin_lte3')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
     $('#dateStart').datetimepicker({
        format: 'yyyy-MM-DD'
    });
     $('#dateEnd').datetimepicker({
        format: 'yyyy-MM-DD'
    });
</script>
@stop()