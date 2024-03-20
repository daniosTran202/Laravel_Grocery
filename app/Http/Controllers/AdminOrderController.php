<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(Request $req)
    {
        $status= $req->status ? $req->status : 0;
        $orders = Order::where('status', $status);
        $start = null;
        $end = null;
        if($req->dateStart && $req->dateEnd){
            $start = date('Y-m-d h:i:s', strtotime($req->dateStart));
            $end = date('Y-m-d h:i:s', strtotime($req->dateEnd));
            $orders = $orders->whereBetween('created_at',[$start,$end]);
        }
        $orders = $orders->paginate();
        return view('admin.order.index',compact('orders','start','end'));
    }


    public function detail($id)
    {
        $order = Order::find($id);
        return view('admin.order.detail',compact('order'));
    }


    public function status($id, Request $req)
    {
        if($req->status){
            Order::where('id',$id)->update(['status' => $req->status]);
        }
        return redirect()->back()->with('yes', 'Update successfully !');
    }
}
