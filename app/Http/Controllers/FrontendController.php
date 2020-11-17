<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;

class FrontendController extends Controller
{
    public function index(){

    	$products = Product::where('status', 1)->latest()->get();
    	$categories = category::where('status', 1)->latest()->get();
    	$lts_p = Product::where('status', 1)->latest()->limit(3)->get();
    	return view('pages.index', compact('products', 'categories', 'lts_p'));
    }


    public function details(){
    	return view('pages.product-details');
    }
}
