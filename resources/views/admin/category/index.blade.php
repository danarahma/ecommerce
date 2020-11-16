@extends('admin.admin_layouts')
@section('category') active @endsection
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
			                  <th class="wd-15p">Category name</th>
			                  <th class="wd-20p">Status</th>
			                  <th class="wd-15p">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              	@php
			              	 $i = 1;
			              	@endphp
			              	@foreach ($categories as $category)
			                <tr>
			                  <td>{{ $i++ }}</td>
			                  <td>{{$category->category_name}}</td>
			                  <td>
			                  	@if($category->status == 1)
								<span class="badge badge-success">Active</span>
								@else
								<span class="badge badge-danger">Inactive</span>
								@endif
			                  </td>
			                  <td>
			                  	<a href="{{ url('admin/categories/edit/'.$category->id)}}"  class="btn btn-success">Edit</a>
								<a href="{{ url('admin/categories/delete/'.$category->id)}}" class="btn btn-danger">Delete</a>
								@if($category->status == 1)
								<a href="{{ url('admin/categories/inactive/'.$category->id)}}" class="btn btn-danger">Inactive</a>
								@else
								<a href="{{ url('admin/categories/active/'.$category->id)}}" class="btn btn-success">Active</a>
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
						Add Category
					</div>

					<div class="card-body">
						<form action="{{ route('store.category')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="exampleInputEmail1">Add Category</label>
								<input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

								@error('category_name')
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