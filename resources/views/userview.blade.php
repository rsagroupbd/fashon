@extends('layouts.app')

@section('content')
 
 <div class="row justify-content-center">
 	@include('sidebar')
 	<div class="col-md-9">
            <div class="card">
                <div class="card-header">User view</div>

                <div class="card-body">
                	<div class="row">
                		<div class="col-md-3">
                            @if($data->profile_image!="")
                			     <img style="height: 150;width: 150px;" src="{{URL::to('profileimage/'.$data->profile_image)}}" alt="Default image">
                            @else
                                <img style="height: 150;width: 150px;" src="{{URL::to('profile.png')}}" alt="Default image">
                            @endif
                		</div>
                		<div class="col-md-7">
                			<h2>Name: <span>{{$data->name}}</span> </h2>
							<P>Email: <span>{{$data->email}}</span></P>
                		</div>
                	</div>
				</div>
			</div>
   	</div>
 </div>

@endsection