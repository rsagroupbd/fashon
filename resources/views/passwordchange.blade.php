@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
 	@include('sidebar')
 	<div class="col-md-9">
            <div class="card">
                <div class="card-header">Change Password</div>

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
                	<form id="form-change-password"  method="POST" action="{{ route('actionchangepassword')}}" novalidate class="form-horizontal">
					  <div class="col-md-9">             
					    <label for="current-password" class="col-sm-4 control-label">Current Password</label>
					    <div class="col-sm-8">
					      <div class="form-group">
					        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
					        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password">
					      </div>
					    </div>
					    <label for="password" class="col-sm-4 control-label">New Password</label>
					    <div class="col-sm-8">
					      <div class="form-group">
					        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
					      </div>
					    </div>
					    <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
					    <div class="col-sm-8">
					      <div class="form-group">
					        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-5 col-sm-6">
					      <button type="submit" class="btn btn-danger">Submit</button>
					    </div>
					  </div>
					</form>
				</div>
			</div>
   	</div>
 </div>

<script >
    $(document).ready(function () {
    $('#form-change-password').validate({ // initialize the plugin
        rules: {
            current_password: {
                required: true
            },
            password: {
                required: true
            },
            password_confirmation: {
                required: true
            },
        }
    });
});
</script>
@endsection
