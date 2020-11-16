<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index() {
    	$brands = Brand::latest()->get();
    	return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request) {
    	$request->validate([
    		'brand_name' => 'required|unique:brands,brand_name'
    	]);

    	Brand::insert([
    		'brand_name' => $request->brand_name,
    		'created_at' => Carbon::now()
    	]);

    	return Redirect()->back()->with('success', 'Brand Added');
    }

    public function Edit($brand_id){
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function UpdateBrand(Request $request) {

        $brand_id = $request->id;
        Brand::find($brand_id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.brands')->with('success', 'brand Updated');
    }

    public function Delete($brand_id){
        Brand::find($brand_id)->delete();
        return Redirect()->back()->with('success', 'brand Deleted Success');
    }

    public function Inactive($brand_id) {

        
        Brand::find($brand_id)->update([
            'status' => 0
        ]);

        return Redirect()->back()->with('success', 'brand Inactive');
    }

    public function Active($brand_id) {

        
        Brand::find($brand_id)->update([
            'status' => 1
        ]);

        return Redirect()->back()->with('success', 'brand Activated');
    }
}
