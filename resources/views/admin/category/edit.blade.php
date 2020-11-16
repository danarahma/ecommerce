@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <span class="breadcrumb-item active">Category</span>
    <span class="breadcrumb-item active">Edit Category</span>
  </nav>

  	<div class="sl-pagebody">
	    <div class="row row-sm">
			<div class="col-md-8 m-auto">
				<div class="card">
					<div class="card-header">
						Edit Category
					</div>

					<div class="card-body">
						<form action="{{ route('update.category')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $category->id}}">
								<label for="exampleInputEmail1">Add Category</label>
								<input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category" value="{{ $category->category_name}}">

								@error('category_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<button type="submit" class="btn btn-primary">Update Category</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection