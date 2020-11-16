@extends('admin.admin_layouts')
@section('brands') active @endsection
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
						All Category
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
			                  <th class="wd-15p">Brand name</th>
			                  <th class="wd-20p">Status</th>
			                  <th class="wd-15p">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              	@php
			              	 $i = 1;
			              	@endphp
			              	@foreach ($brands as $brand)
			                <tr>
			                  <td>{{ $i++ }}</td>
			                  <td>{{$brand->brand_name}}</td>
			                  <td>
			                  	@if($brand->status == 1)
								<span class="badge badge-success">Active</span>
								@else
								<span class="badge badge-danger">Inactive</span>
								@endif
			                  </td>
			                  <td>
			                  	<a href="{{ url('admin/brands/edit/'.$brand->id)}}"  class="btn btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{{ url('admin/brands/delete/'.$brand->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								@if($brand->status == 1)
								<a href="{{ url('admin/brands/inactive/'.$brand->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
								@else
								<a href="{{ url('admin/brands/active/'.$brand->id)}}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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
						Add Brand
					</div>

					<div class="card-body">
						<form action="{{ route('store.brand')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="exampleInputEmail1">Add Brand</label>
								<input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

								@error('brand_name')
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