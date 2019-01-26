@extends('layouts.app')

@section('content')
 
 <div class="row justify-content-center">
 	@include('sidebar')
 	<div class="col-md-9">
            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
					<table class="table table-bordered">
				          <thead>
				            <tr>
				              <th scope="col">#</th>
				              <th scope="col">Profile Picture</th>
				              <th scope="col">Name</th>
				              <th scope="col">Status</th>
				              <th scope="col">Action</th>
				            </tr>
				          </thead>
				          <tbody>
							@php($i=1)
							@if(count($data)!=0)
				         @foreach($data as $product)
				           <tr>
				             <th scope="row">{{$i}}</th>
				             <td class="text-center"><img style="width: 50px;height: 50px;" src="{{URL::to('productimage/'.$product->product_image)}}" alt="Profile Picture"></td>
				             <td>{{$product->product_name}}</td>
				             <td>
				             	@if($product->product_status==1)
				             		<span class="badge badge-success">Active</span>
				             	@else
									<span class="badge badge-danger">Inactive</span>
				             	@endif
				             </td>
				             <td>
				             	<a  href="{{route('product.show',$product->id)}}">View</a>
				              	<a  href="{{route('product.edit',$product->id)}}">Edit</a>
				            	<a  href="#">Delete</a>
				          	</td>
				           </tr>

				           @php($i++)
				           @endforeach
				           @else
				           <td class="text-center" colspan="5">No Data Found</td>
				           @endif
				          </tbody>
				    </table>
				</div>
			</div>
   	</div>
 </div>

@endsection