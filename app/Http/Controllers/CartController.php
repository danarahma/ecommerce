<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id){

    	$check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();
    	if ($check) {
    		Cart::where('product_id', $product_id)->increment('qty');
    		return Redirect()->back()->with('cart', 'Product Succes Added to Cart');
    	} else {
	    	Cart::insert([
	    		'product_id' => $product_id,
	    		'qty' => 1,
	    		'price' => $request->price,
	    		'user_ip' => request()->ip(),
	    	]);


	    	return Redirect()->back();

    	}
    }

    public function Cart() {

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $total = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                                return $t->price * $t->qty;
                            });
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                                return $t->price * $t->qty;
                            });
        return view('pages.cart', compact('carts', 'total', 'subtotal'));
    }

    public function CartDestroy($cart_id) {
        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->delete();
        return Redirect()->back()->with('cart', 'Cart Product removed');
    }


    public function UpdateQty(Request $request, $cart_id){

        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->update([
            'qty' => $request->qty,
        ]);

        return Redirect()->back()->with('cart', 'Cart Product Updated');
    }

    public function CouponApply(Request $request){

        $check = Coupon::where('coupon_name', $request->coupon_name)->first();
        if ($check) {

            Session::put('coupon',[
                'coupon_name' => $check->coupon_name,
                'coupon_discount' => $check->discount,
            ]);
            return Redirect()->back()->with('cart', 'Successfully Coupon Applied ');
            
        } else {
            return Redirect()->back()->with('cart', 'Invalid Coupon');
        }
    }
}
