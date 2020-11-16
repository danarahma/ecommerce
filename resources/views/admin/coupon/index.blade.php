@extends('admin.admin_layouts')
@section('coupon') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Basic Tables</span>
  </nav>

  	<div class="sl-pagebody">
	    <div class="row row-sm">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						All Coupon
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
			                  <th class="wd-15p">Coupon name</th>
			                  <th class="wd-15p">Discount</th>
			                  <th class="wd-20p">Status</th>
			                  <th class="wd-15p">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              	@php
			              		$i = 1;
			              	@endphp
			              	@foreach ($coupons as $coupon)
			                <tr>
			                  <td>{{ $i++ }}</td>
			                  <td>{{$coupon->coupon_name}}</td>
			                  <td>{{$coupon->discount}}%</td>
			                  <td>
			                  	@if($coupon->status == 1)
								<span class="badge badge-success">Active</span>
								@else
								<span class="badge badge-danger">Inactive</span>
								@endif
			                  </td>
			                  <td>
			                  	<a href="{{ url('admin/coupons/edit/'.$coupon->id)}}"  class="btn btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{{ url('admin/coupons/delete/'.$coupon->id)}}" class="btn btn-danger" onclick="return confirm('Arey You Sure to Delete?')"><i class="fa fa-trash"></i></a>
								@if($coupon->status == 1)
								<a href="{{ url('admin/coupons/inactive/'.$coupon->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
								@else
								<a href="{{ url('admin/coupons/active/'.$coupon->id)}}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
								@endif
			                  </td>
			                </tr>
			                @endforeach
			              </tbody>
			            </table>							
						</div>						
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Add Coupon
					</div>

					<div class="card-body">
						<form action="{{ route('store.coupon')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="exampleInputEmail1">Add Coupon</label>
								<input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Coupon">

								@error('coupon_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Coupon Discount</label>
								<input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Coupon Discount %">

								@error('discount')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<button type="submit" class="btn btn-primary">Add</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection