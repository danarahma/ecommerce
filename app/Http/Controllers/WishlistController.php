<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($product_id){
    	if (Auth::check()) {
    		Wishlist::insert([
    				'user_id' => Auth::id(),
    				'product_id' => $product_id,
    		]);

    		return Redirect()->back()->with('cart', 'Product added On Wishlist');
    	} else{
    		return Redirect()->route()->back()->with('loginError', 'At First Login Your Account');
    	}
    }

    public function wishlist() {
    	$wishlists = Wishlist::where('user_id', Auth::id())->latest()->get();
    	return view('pages.wishlist', compact('wishlists'));
    }

    public function Destroy($wishlist_id) {
        Wishlist::where('id', $wishlist_id)->where('user_id', Auth::id())->delete();
        return Redirect()->back()->with('wishlist', 'Wishlist Product removed');
    }

}
