@extends('layouts.app')

@section('content')
 
 <div class="row justify-content-center">
 	@include('sidebar')

 	<div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                	@if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                
					<form id="productedit" method="post" action="{{route('product.update',$data->id)}}" enctype="multipart/form-data">
						@csrf					
						  <div class="form-group">
						    <label for="exampleFormControlInput1">Product Name</label>
						    <input type="text" name="productname" value="{{$data->product_name}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
						  </div>

						  <div class="form-group">

						    <label for="exampleFormControlInput1">Expire Date</label>
						    <input type="date" name="expiredate" value="{{$data->product_espire_time}}" class="form-control" id="exampleFormControlInput1">

						  </div>
							 <div class="form-group">
							    @if ("{{ $data->product_image }}")
							        <img class="img-thumbnail" style="height:200px;width: 200px;" src="{{ Url::to('productimage/'.$data->product_image) }}">
							    @else
							            <p>No image found</p>
							    @endif
							        image <input type="file"  name="productimage"/>
						    </div>
						  
						    <div class="form-group">
							  	<div class="form-check form-check-inline">

									@if($data->product_status==1)
									  <input class="form-check-input" name="status" checked type="checkbox"  value="1">
									@else
									  <input class="form-check-input" name="status" type="checkbox" value="0">
									@endif
									  <label class="form-check-label" for="inlineCheckbox1">Active</label>

								</div>
							</div>
							
						<input type="hidden" name="_method" value="put">
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
   	</div>

 </div>
<script >
    $(document).ready(function () {
    $('#productedit').validate({ // initialize the plugin
        rules: {
            productname: {
                required: true
            },
             expiredate: {
                required: true
            },
            productimage:{
            	accept:'image/*',
            }
        }
    });
});
</script>
 @endsection