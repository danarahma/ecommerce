@extends('admin.admin_layouts')
@section('orders') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Order</span>
  </nav>

  	<div class="sl-pagebody">
	    <div class="row row-sm">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Order List
					</div>
					<div class="card-body">
						@if(session('success'))
						<div class="alert alert-success alert-dismissable fade show" role="alert">
							<strong>{{session('success')}}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif
						<div class="table-wraper">
						 <table id="datatable1" class="table display responsive nowrap">
			              <thead>
			                <tr>
			                  <th class="wd-15p">Sl</th>
			                  <th class="wd-15p">Invoice No</th>
			                  <th class="wd-15p">Payment Type</th>
			                  <th class="wd-20p">Total</th>
			                  <th class="wd-20p">Sub total</th>
			                  <th class="wd-20p">Coupon Discount</th>
			                  <th class="wd-25p">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              	@php
			              		$i = 1;
			              	@endphp
			              	@foreach ($orders as $row)
			                <tr>
			                  <td>{{ $i++ }}</td>
			                  <td>{{$row->invoice_no}}</td>
			                  <td>{{$row->payment_type}}%</td>
			                  <td>{{$row->total}}$</td>
			                  <td>{{$row->subtotal}}$</td>
			                  <td>
			                  	@if($row->coupon_discount == NULL)
								<span class="badge badge-success">No</span>
								@else
								<span class="badge badge-danger">Yes</span>
								@endif
			                  </td>
			                  <td>
			                  	<a href="{{ url('admin/orders/view/'.$row->id)}}"  class="btn btn-success"><i class="fa fa-eye"></i></a>
								<a href="{{ url('admin/coupons/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('Arey You Sure to Delete?')"><i class="fa fa-trash"></i></a>
			                  </td>
			                </tr>
			                @endforeach
			              </tbody>
			            </table>							
						</div>						
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
@endsection