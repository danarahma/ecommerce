<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Brand;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function addProduct() {
    	$categories = category::latest()->get();
    	$brands = Brand::latest()->get();
    	return view('admin.product.add', compact('categories', 'brands'));
    }


    public function StoreProduct(Request $request){
    	$request->validate([
    		'product_name' => 'required|max:255',
    		'product_code' => 'required|max:255',
    		'price' => 'required|max:255',
    		'product_quantity' => 'required|max:255',
    		'category_id' => 'required|max:255',
    		'brand_id' => 'required|max:255',
    		'short_description' => 'required',
    		'long_description' => 'required',
    		'image_one' => 'required|mimes:jpg,jpeg,png,gif',
    		'image_two' => 'required|mimes:jpg,jpeg,png,gif',
    		'image_three' => 'required|mimes:jpg,jpeg,png,gif',
    	], [
    		'category_id.required' => 'select category_name',
    		'brand_id.required' => 'select brand_name'
    	]);

    	$imag_one = $request->file('image_one');
    	$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    	Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    	$img_url1 = 'front/img/product/upload/'.$name_gen;

    	$imag_two = $request->file('image_two');
    	$name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
    	Image::make($imag_two)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    	$img_url2 = 'front/img/product/upload/'.$name_gen;
    	
    	$imag_three = $request->file('image_three');
    	$name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
    	Image::make($imag_three)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    	$img_url3 = 'front/img/product/upload/'.$name_gen;


    	Product::insert([
    		'category_id' => $request->category_id,
    		'brand_id' => $request->brand_id,
    		'product_name' => $request->product_name,
    		'product_slug' => strtolower(str_replace(' ', '-' ,$request->product_name)),
    		'product_code' => $request->product_code,
    		'price' => $request->price,
    		'product_quantity' => $request->product_quantity,
    		'short_description' => $request->short_description,
    		'long_description' => $request->long_description,
    		'image_one' => $img_url1,
    		'image_two' => $img_url2,
    		'image_three' => $img_url3,
    		'created_at' => Carbon::now(),
    	]);

    	return Redirect()->back()->with('success', 'Product Added');
    }

    public function ManageProduct(){
    	$products = Product::orderBy('id', 'DESC')->get();
    	return view('admin.product.manage', compact('products'));
    }

    public function Edit($product_id){
    	$categories = category::latest()->get();
    	$brands = Brand::latest()->get();
    	$product = Product::findOrFail($product_id);
    	return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }



    public function UpdateProduct(Request $request){
    	$product_id = $request->id;
    	Product::findOrFail($product_id)->Update([
    		'category_id' => $request->category_id,
    		'brand_id' => $request->brand_id,
    		'product_name' => $request->product_name,
    		'product_slug' => strtolower(str_replace(' ', '-' ,$request->product_name)),
    		'product_code' => $request->product_code,
    		'price' => $request->price,
    		'product_quantity' => $request->product_quantity,
    		'short_description' => $request->short_description,
    		'long_description' => $request->long_description,
    		'update_at' => Carbon::now(),
    	]);

    	return Redirect()->route('manage-products')->with('success', 'Product successfully Updated');
    }


    public function UpdateImage(Request $request){
    	$product_id = $request->id;
    	$old_one = $request->img_one;
    	$old_two = $request->img_two;
    	$old_three = $request->img_three;

    	if ($request->has('image_one') && $request->has('image_two') && $request->has('image_three')) {
    		unlink($old_one);
    		unlink($old_two);
    		unlink($old_three);
    		$imag_one = $request->file('image_one');
    		$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    		Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    		$img_url1 = 'front/img/product/upload/'.$name_gen;

	    	Product::findOrFail($product_id)->Update([
	    		'image_one' => $img_url1,
	    		'updated' => Carbon::now(),
	    	]);

	    	$imag_one = $request->file('image_two');
    		$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    		Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    		$img_url1 = 'front/img/product/upload/'.$name_gen;

	    	Product::findOrFail($product_id)->Update([
	    		'image_two' => $img_url1,
	    		'updated' => Carbon::now(),
	    	]);

	    	$imag_one= $request->file('image_three');
    		$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    		Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    		$img_url1 = 'front/img/product/upload/'.$name_gen;

	    	Product::findOrFail($product_id)->Update([
	    		'image_three' => $img_url1,
	    		'updated' => Carbon::now(),
	    	]);

	    	return Redirect()->route('manage-products')->with('success', 'Image successfully Updated');
    	}

    	if ($request->has('image_one')) {
    		unlink($old_one);
    		$imag_one = $request->file('image_one');
    		$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    		Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    		$img_url1 = 'front/img/product/upload/'.$name_gen;

	    	Product::findOrFail($product_id)->Update([
	    		'image_one' => $img_url1,
	    		'updated' => Carbon::now(),
	    	]);

	    	return Redirect()->route('manage-products')->with('success', 'Image successfully Updated');
    	}

    	if ($request->has('image_two')) {
    		unlink($old_two);
    		$imag_one = $request->file('image_two');
    		$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    		Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    		$img_url1 = 'front/img/product/upload/'.$name_gen;

	    	Product::findOrFail($product_id)->Update([
	    		'image_two' => $img_url1,
	    		'updated' => Carbon::now(),
	    	]);

	    	return Redirect()->route('manage-products')->with('success', 'Image successfully Updated');
    	}
 
    	if ($request->has('image_three')) {
    		unlink($old_three);
    		$imag_one= $request->file('image_three');
    		$name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    		Image::make($imag_one)->resize(270, 270)->save('front/img/product/upload/'.$name_gen);
    		$img_url1 = 'front/img/product/upload/'.$name_gen;

	    	Product::findOrFail($product_id)->Update([
	    		'image_three' => $img_url1,
	    		'updated' => Carbon::now(),
	    	]);

	    	return Redirect()->route('manage-products')->with('success', 'Image successfully Updated');
    	}
    }



    public function Delete($product_id){

    	$image = Product::findOrFail($product_id);
    	$img_one = $image->image_one;
    	$img_two = $image->image_two;
    	$img_three = $image->image_three;
    	unlink($img_one);
    	unlink($img_two);
    	unlink($img_three);

    	Product::findOrFail($product_id)->delete();
    	return Redirect()->back()->with('success', 'Product successfully Deleted');
    }

    public function Inactive($product_id) {

        
        Product::find($product_id)->update([
            'status' => 0
        ]);

        return Redirect()->back()->with('success', 'Product Inactive');
    }

    public function Active($product_id) {

        
        Product::find($product_id)->update([
            'status' => 1
        ]);

        return Redirect()->back()->with('success', 'Product Activated');
    }

}
