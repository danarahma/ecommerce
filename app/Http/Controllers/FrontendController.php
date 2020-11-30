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


    public function details($product_id){
    	$product = Product::findOrfail($product_id);
    	$category_id = $product->category_id;
    	$related_p = Product::where('category_id', $category_id)->where('id', '!=', $product_id)->latest()->get();
    	return view('pages.product-details', compact('product', 'related_p'));
    }

    public function shopPage(){
        $products = Product::latest()->get();
        $productsp = Product::latest()->paginate(9);
        $categories = category::where('status', 1)->latest()->get();
        return view('pages.shop', compact('products', 'categories', 'productsp'));
    }

    public function showProduct($cat_id){
        $products = Product::where('category_id', $cat_id)->latest()->paginate(9);
        $categories = category::where('status', 1)->latest()->get();
        return view('pages.cat-product', compact('products', 'categories'));
    }
}
