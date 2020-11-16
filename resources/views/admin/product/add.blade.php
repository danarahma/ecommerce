@extends('admin.admin_layouts')
@section('products') active show-sub @endsection
@section('add-products') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Basic Tables</span>
  </nav>

  	<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add New Products</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <form action="{{ route('store-products')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
              @if(session('success'))
              <div class="alert alert-success alert-dismissable fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" placeholder="Enter product name" value="{{ old('product_name')}}">
                    @error('product_name')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" placeholder="Enter product code" value="{{ old('product_code')}}">
                    @error('product_code')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="price" placeholder="Product price" value="{{old('price')}}">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="product_quantity" placeholder="Product quantity" value="{{old('product_quantity')}}">
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
                      <option value="{{ $category->id}}">{{ $category->category_name}}</option>
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
                      <option value="{{ $brand->id}}">{{ $brand->brand_name}}</option>
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
                    <textarea name="short_description" id="summernote2">{{old('short_description') }}</textarea>
                    @error('short_description')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Long Description: <span class="tx-danger"></span></label>
                    <textarea name="long_description" id="summernote">{{ old('long_description') }}</textarea>
                    @error('long_description')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                    <input type="file" class="form-control" name="image_one" value="{{ old('image_one')}}">
                    @error('image_one')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                    <input type="file" class="form-control" name="image_two" value="{{ old('image_two')}}">
                    @error('image_two')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                    <input type="file" class="form-control" name="image_three" value="{{ old('image_three')}}">
                    @error('image_three')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->

              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Add Product</button>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>
        </div><!-- card -->

      </div><!-- sl-pagebody -->
</div>
@endsection