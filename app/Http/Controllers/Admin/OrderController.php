<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::latest()->get();
    	return view('admin.order.index', compact('orders'));
    }
}
