@extends('layouts.app')

@section('content')
 
 <div class="row justify-content-center">
 	@include('sidebar')

 	<div class="col-md-9">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                
					<form id="addproduct" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
						@csrf					
						  <div class="form-group">
						    <label for="productname">Product Name</label>
						    <input type="text" name="productname" class="form-control" id="productname" placeholder="Product Name">
						  </div>

						  <div class="form-group">
						  	<label for="productcategory">Category</label>
						  	<select name="productcategory" class="form-control">
						  		<option value="">--Select Category--</option>
						  		<option value="1">Option One</option>
						  	</select>
						  </div>
						<div class="form-group">
							<label for="productprice">Price</label>
							<input type="text" placeholder="Price" name="productprice" class="form-control">

						</div>
						  
						  <div class="form-group">
						    <label for="productimage">Product Image</label>
						    <input type="file" name="productimage" class="form-control" id="productimage">
						  </div>

						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Save </button>
						</div>
					</form>
				</div>
			</div>
   	</div>

 </div>
<script >
    $(document).ready(function () {
    $('#addproduct').validate({ // initialize the plugin
        rules: {
            productname: {
                required: true
            },
            expiredate: {
                required: true
            },
            productimage: {
                required: true,
                accept:'image/*'
            },
        }
    });
});
</script>
 @endsection