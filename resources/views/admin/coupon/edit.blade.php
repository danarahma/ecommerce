@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Coupon</span>
    <span class="breadcrumb-item active">Edit Coupon</span>
  </nav>

  	<div class="sl-pagebody">
	    <div class="row row-sm">
			<div class="col-md-8 m-auto">
				<div class="card">
					<div class="card-header">
						Edit Coupon
					</div>

					<div class="card-body">
						<form action="{{ route('update.coupon')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $coupon->id}}">
								<label for="exampleInputEmail1">Add Coupon</label>
								<input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Coupon" value="{{ $coupon->coupon_name}}">

								@error('coupon_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Coupon Discount</label>
								<input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Coupon Discount" value="{{ $coupon->discount}}">

								@error('discount')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<button type="submit" class="btn btn-primary">Update Coupon</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection