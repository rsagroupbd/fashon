@extends('layouts.app')

@section('content')
 
 <div class="row justify-content-center">
 	@include('sidebar')
 	<div class="col-md-9">
            <div class="card">
                <div class="card-header">Product view</div>

                <div class="card-body">
                	<div class="row">
                		<div class="col-md-4">
                            @if($data->product_image!='')
                                <img style="width: 200px;height: 200px;" src="{{URL::to('productimage/'.$data->product_image)}}" class="img-fluid" alt="Product image">
                            @else
                                <img style="width: 200px;height: 200px;" src="{{URL::to('profile.png')}}" class="img-fluid" alt="Default image">
                            @endif

                		</div>
                		<div class="col-md-6">
                			<h2>Name: <span>{{$data->product_name}}</span> </h2>
							<p >Category: <span >{{$data->category->category_name}}</span></p>
                            <p >Price: <span >{{$data->product_price}}</span></p>
							@if($data->product_status==1)
							<p >Status: <span class="badge badge-success">Active</span></p>
							@else
							<p >Stauts: <span class="badge badge-danger">In-Active</span></p>
							@endif
                			
                		</div>
                	</div>
				</div>
			</div>
   	</div>
 </div>

@endsection