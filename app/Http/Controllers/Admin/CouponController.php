<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
    	$coupons = Coupon::latest()->get();
    	return view('admin.coupon.index', compact('coupons'));
    }


    public function StoreCoupon(Request $request) {

    	Coupon::insert([
    		'coupon_name' => strtoupper($request->coupon_name),
            'discount' => $request->discount,
    		'created_at' => Carbon::now()
    	]);

    	return Redirect()->back()->with('success', 'Coupon Added');
    }

    public function Edit($coupon_id){
        $coupon = Coupon::find($coupon_id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function UpdateCoupon(Request $request) {

        $coupon_id = $request->id;
        Coupon::find($coupon_id)->update([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.coupon')->with('success', 'coupon Updated');
    }

    public function Delete($coupon_id){
        Coupon::find($coupon_id)->delete();
        return Redirect()->back()->with('success', 'coupon Deleted Success');
    }

    public function Inactive($coupon_id) {

        
        Coupon::find($coupon_id)->update([
            'status' => 0
        ]);

        return Redirect()->back()->with('success', 'coupon Inactive');
    }

    public function Active($coupon_id) {

        
        Coupon::find($coupon_id)->update([
            'status' => 1
        ]);

        return Redirect()->back()->with('success', 'coupon Activated');
    }

}
