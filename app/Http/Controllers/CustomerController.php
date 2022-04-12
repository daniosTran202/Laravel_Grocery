<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use Auth;
use Mail;

class CustomerController extends Controller
{
    public function login(Cart $cart)
    {
        return view('customer.login',compact('cart'));
    }

    public function check_login(Request $req)
    {
        $data = $req->only('email', 'password');
        $check_login = Auth::guard('cus')->attempt($data , $req -> has('remember'));
        if($check_login){
            return redirect()->route('client.home')->with('yes','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('no','Email hoặc mật khẩu không chính xác !');
        }
    }

    public function register(Cart $cart)
    {
        return view('customer.register',compact('cart'));
    }

    public function add_customer(Request $req)
    {
        $req->validate([
            'password' => 'required ',
            'confirm_password' => 'required:same:password ',
        ]);

        $pass_hashed = bcrypt($req->password);
        $req->merge(['password' => $pass_hashed]);
        $data = $req->only('email','name','password','phone','address','gender'); 
        if(Customer::create($data)){
            return redirect()->route('customer.login');
        }else{
            return redirect()->back();
        }
    }

    public function logout(Request $req)
    {
        Auth::guard('cus')->logout();
        return redirect()->route('customer.login');
    }

    public function forgot_password(Cart $cart)
    {
       return view('customer.forgot_password',compact('cart'));
    }

    public function forgot_password_reset(Request $req, Cart $cart)
    {
        $customer = Customer::where('email',$req->email)->first();
        if($customer){
            $passwordNew = bcrypt($req->passwordNew);
            $customer->update(['password'=> $passwordNew]);
            $password = $req->passwordNew;
            $email = $req->email;
            Mail::send('customer.password',compact('password', 'email'), function($mail) use($req){
                $mail->to($req->email)->subject('Thay đổi mật khẩu thành công');
            });
            return redirect()->route('customer.login')->with('yes', 'Mật khẩu của bạn đã được gửi tới Gmail của bạn');
        }
        return view('customer.forgot_password')->with('yes', 'Mật khẩu của bạn đã được gửi tới Gmail của bạn');
    }

    public function profile(Request $req , Cart $cart)
    {
        $prof = Auth::guard('cus')->user();
        return view('customer.profile',compact('prof','cart'));
    }


    public function update_profile(Request $req,Cart $cart)
    {
        $prof = Auth::guard('cus')->user();
       
        $pass_hashed = $prof->password;

        if($req->password){
            $req->validate([
                'confirm_password' => 'required:same:password ',
            ]);
            
            $pass_hashed = bcrypt($req->password);    
        }

        $req->merge(['password' => $pass_hashed]);
        $data = $req->only('email','name','password','phone','address','gender'); 

        if($prof->update($data)){
            return redirect()->route('client.home')->with('yes', 'Thông tin của bạn đã được thay đổi thành công');
        }else{
            return redirect()->back();
        }
    }


}
