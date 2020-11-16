@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Brand</span>
    <span class="breadcrumb-item active">Edit Brand</span>
  </nav>

  	<div class="sl-pagebody">
	    <div class="row row-sm">
			<div class="col-md-8 m-auto">
				<div class="card">
					<div class="card-header">
						Edit Brand
					</div>

					<div class="card-body">
						<form action="{{ route('update.brand')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $brand->id}}">
								<label for="exampleInputEmail1">Add Brand</label>
								<input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" value="{{ $brand->brand_name}}">

								@error('brand_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<button type="submit" class="btn btn-primary">Update Brand</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection