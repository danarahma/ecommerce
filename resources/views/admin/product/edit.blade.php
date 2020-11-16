@extends('admin.admin_layouts')
@section('products') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Admin</a>
    <span class="breadcrumb-item active">Update Product</span>
  </nav>

  	<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Product</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <form action="{{ route('update.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id}}">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" placeholder="Enter product name" value="{{ $product->product_name }}">
                    @error('product_name')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" placeholder="Enter product code" value="{{ $product->product_code }}">
                    @error('product_code')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="price" placeholder="Product price" value="{{ $product->price }}">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="product_quantity" placeholder="Product quantity" value="{{ $product->product_quantity }}">
                    @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" name="category_id" data-placeholder="Choose brand">
                      <option label="Choose brand"></option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id}}" {{ $category->id == $product->category_id ? "selected":""}}>{{ $category->category_name}}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" name="brand_id" data-placeholder="Choose brand">
                      <option label="Choose category"></option>
                      @foreach($brands as $brand)
                      <option value="{{ $brand->id}}" {{ $brand->id == $product->brand_id ? "selected":""}}>{{ $brand->brand_name}}</option>
                      @endforeach
                    </select>
                    @error('brand_id')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Short Description: <span class="tx-danger"></span></label>
                    <textarea name="short_description" id="summernote2">{{ $product->short_description }}</textarea>
                    @error('short_description')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Long Description: <span class="tx-danger"></span></label>
                    <textarea name="long_description" id="summernote">{{ $product->long_description }}</textarea>
                    @error('long_description')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Update Product</button>
              </div><!-- form-layout-footer -->
           </div>
          </form>
        </div>
        <div class="card pd-20 pd-sm-40">
          <form action="{{ route('update-image')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="img_one" value="{{ $product->image_one }}">
            <input type="hidden" name="img_two" value="{{ $product->image_two }}">
            <input type="hidden" name="img_three" value="{{ $product->image_three }}">
            <div class="form-layout">
            	<div class="row mg-b-25">            		
	                <div class="col-lg-4">
	                  <div class="form-group mg-b-10-force">
	                    <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
	                    <img src="{{ asset($product->image_one) }}" alt="" height="120px" width="120px">
	                  </div>
	                </div>
	                <div class="col-lg-4">
	                  <div class="form-group mg-b-10-force">
	                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
	                    <img src="{{ asset($product->image_two) }}" alt="" height="120px" width="120px">
	                  </div>
	                </div>
	                <div class="col-lg-4">
	                  <div class="form-group mg-b-10-force">
	                    <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
	                    <img src="{{ asset($product->image_three) }}" alt="" height="120px" width="120px">
	                  </div>
	                </div>
	                <div class="col-lg-4">
	                  <div class="form-group mg-b-10-force">
	                    <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
	                    <input type="file" class="form-control" name="image_one">
	                    @error('image_one')
	                      <strong class="text-danger">{{ $message }}</strong>
	                    @enderror
	                  </div>
	                </div>
	                <div class="col-lg-4">
	                  <div class="form-group mg-b-10-force">
	                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
	                    <input type="file" class="form-control" name="image_two">
	                    @error('image_two')
	                      <strong class="text-danger">{{ $message }}</strong>
	                    @enderror
	                  </div>
	                </div>
	                <div class="col-lg-4">
	                  <div class="form-group mg-b-10-force">
	                    <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
	                    <input type="file" class="form-control" name="image_three">
	                    @error('image_three')
	                      <strong class="text-danger">{{ $message }}</strong>
	                    @enderror
	                  </div>
	                </div>
                </div><!-- row -->
            </div>

	        <div class="form-layout-footer">
	            <button class="btn btn-info mg-r-5">Update Product</button>
	        </div><!-- form-layout-footer -->
          </form>
        </div><!-- card -->

      </div><!-- sl-pagebody -->
</div>
@endsection