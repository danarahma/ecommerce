@extends('admin.admin_layouts')
@section('orders') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Admin</a>
    <span class="breadcrumb-item active">Shipping Address</span>
  </nav>

  	<div class="sl-pagebody">
	    <div class="row row-sm" style="margin-top: 20px;">
			<div class="card pd-20 pd-sm-40">
	          <h6 class="card-body-title">View</h6>

	          <div class="form-layout">
	            <div class="row mg-b-25">
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Firstname: </label>
	                  <input class="form-control" type="text" name="firstname" value="{{ $shipping->shipping_first_name }}" readonly>
	                </div>
	              </div><!-- col-4 -->
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Lastname: </label>
	                  <input class="form-control" type="text" name="lastname" value="{{ $shipping->shipping_last_name }}" readonly>
	                </div>
	              </div><!-- col-4 -->
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Email address: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_email }}" readonly>
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Phone: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_phone }}" readonly>
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Shipping Address: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $shipping->address }}" readonly>
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">State: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $shipping->state }}" readonly>
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Post Code: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $shipping->post_code }}" readonly>
	                </div>
	              </div>
	            </div><!-- row -->
	          </div><!-- form-layout -->
	        </div><!-- card -->
		</div>
	
	    <div class="row row-sm" style="margin-top: 20px;">
			<div class="card pd-20 pd-sm-40">
	          <h6 class="card-body-title">Orders</h6>

	          <div class="form-layout">
	            <div class="row mg-b-25">
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Invoice No: </label>
	                  <input class="form-control" type="text" name="firstname" value="{{ $order->invoice_no }}" readonly>
	                </div>
	              </div><!-- col-4 -->
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Payment Type: </label>
	                  <input class="form-control" type="text" name="lastname" value="{{ $order->payment_type }}" readonly>
	                </div>
	              </div><!-- col-4 -->
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Total: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $order->total }}" readonly>
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Sub Total: </label>
	                  <input class="form-control" type="text" name="email" value="{{ $order->subtotal }}" readonly>
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  <label class="form-control-label">Coupon Discount: </label>
	                  @if($order->coupon_discount == NULL)
	                  <span class="badge badge-pill badge-danger">No</span>
	                  @else
	                  <span class="badge badge-pill badge-danger">{{ $order->coupon_discount }} %</span>
	                  @endif
	                </div>
	              </div>
	            </div><!-- row -->
	          </div><!-- form-layout -->
	        </div><!-- card -->
		</div>

		<div class="row row-sm" style="margin-top: 20px;">
			<div class="card pd-20 pd-sm-40">
	          <h6 class="card-body-title">Order Item</h6>

	          <div class="form-layout">
            	<div class="table-wrapper">
            		<table id="" class="table display responsive nowrap">
            			<thead>
            				<tr>
            					<th class="wd-15p">Image</th>
            					<th class="wd-15p">Product Name</th>
            					<th class="wd-15p">Quantity</th>
            				</tr>
            			</thead>
            			<tbody>
            				@foreach ($orderItems as $row)
            				<tr>
            					<td>
            						<img src="{{ asset($row->product->image_one) }}" height="50" width="50" alt="img">
            					</td>
            					<td>
            						{{ $row->product->product_name }}
            					</td>
            					<td>
            						{{ $row->product_qty }}
            					</td>
            				</tr>
            				@endforeach
            			</tbody>
            		</table>
            	</div>	            
	          </div><!-- form-layout -->
	        </div><!-- card -->
		</div>
	</div>
</div>
@endsection