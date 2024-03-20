<?php

namespace App\Http\Controllers;
use App\Http\Middleware\CusMiddleWare;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use Auth;
use Mail;
use Str;
use PDF;

class OrderController extends Controller
{
    public function checkout(Cart $cart)
    {
        if( $auth = Auth::guard('cus')->user()){
            return view('client.check_out', compact('auth','cart'));
        }else{
            return view('cart.empty');
        }
      
       
    }


    public function post_checkout(Request $req ,Cart $cart)

    {

        $rules= [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|numeric'
        ];
        $messages = [
            
            'name.required' => 'Password required !',
            'email.required' => 'Password required !',
            'email.unique' => 'Already email, try again !',
            'email.email'=> 'Formatted email !',
            'address.required' => 'Password required !',
            'phone.required' => 'Password required !',
            'phone.numeric' => 'Password must be a number!'

        ];
        $req->validate($rules,$messages);
        $check = true;
        $auth = Auth::guard('cus')->user();
        $data = $req->only('customer_id','name', 'email', 'address', 'phone', 'total_price','status');
        if($order = Order::create($data)){
            $order_id = $order->id;

            foreach($cart->items as $item){
                $detail =[
                    'order_id' => $order_id,
                    'product_id' => $item['id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ];

                
                if(!OrderDetail::create($detail)){ // 
                    $check = false;
                    break;
                }
            }


            if($check){
                $order = Order::find($order_id);
                $token = strtoupper(Str::random(20));
                $order->update(['token' => $token]);
                    Mail::send('client.email', compact('auth','order','cart'), function($mail) use($auth){
                    $mail->to($auth->email, $auth->name);
                    $mail->subject('Email xác nhận đơn hàng');
                });
                $cart->clear(); 
                return redirect()->route('order.success');
            }else{
                OrderDetail::where('order_id',$order_id)->delete();
                Order::where('id',$order_id)->delete();
                return redirect()->route('order.error');
            }
        }
    }


    public function detail($id,Cart $cart)
    {
        $order = Order::find($id);
        return view('client.detail' ,compact('order','cart'));
    }


    public function history(Cart $cart)
    {
        $auth = Auth::guard('cus')->user();
        $orders = $auth->orders()->paginate(10);
        return view('client.history', compact('auth','orders','cart'));
    }


    public function pdf($id , Request $request,Cart $cart)
    {
        $order = Order::find($id);
        if($order){
            $pdf = PDF::loadView('client.pdf',compact('order','cart'));        
            if($request->action == 'download'){
                return $pdf->download('order-detail.pdf');
            }else{
                return $pdf->stream();
            }
        }else{
            return view('site.404');
        }
    }


    public function success(Cart $cart)
    {
        return view('client.success',compact('cart'));
    }


    public function error(Cart $cart)
    {
        return view('client.error',compact('cart'));
    }


    public function confirm($token,Cart $cart)
    {
        $order = Order::Where('token',$token)->first();
        if($order){
            $order->update(['token' => null, 'status' => 1]);
            return redirect()->route('order.success');
        }else{
            return abort(404);
        }
    }
}
