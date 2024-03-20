<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function add($id,Cart $cart)
    {
        $product = Product::find($id);
        $cart->setItem($product);
        return redirect()->route('client.shop');
    }


    public function remove($id,Cart $cart)
    {
        $cart->removeItem($id);
        return redirect()->route('cart.view');
    }


    public function update($id,Cart $cart)
    {
        
        if($quantity = request('quantity',1)){
            $cart->updateItem($id,$quantity);
            return redirect()->route('cart.view');
        }else{
            return redirect()->back()->with('no','Quantity must be more than 0 !');
        }
        
    }


    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->route('cart.view');
    }


    public function view(Cart $cart)
    {
        if($cart->totalQuantity > 0){
            return view('client.cart', compact('cart'));
        }else{
            return view('client.cart-empty',compact('cart'));
        }
    }
}
