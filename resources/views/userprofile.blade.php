@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
         @include('sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">View Profile</div>

                <div class="card-body">
                  <div class="row ">
                    <div class="col-md-10">
                      <h3>Name: {{Auth::user()->name}}</h3>
                    <p>Email: {{Auth::user()->email}}</p>
                    </div>
                    
                  </div>

                  @if(Auth::user()->profile_image!="")
                  <div class="row justify-content-center">

                    <div class="col-md-10 text-center">

                       <img style="height: 200px;width: 200px;"  src="{{URL::to('profileimage/'.Auth::user()->profile_image)}}"><br>

                       <button id="btnshowform" class="btn btn-primary">Change</button>
                       <div class="row d-none justify-content-center" id="hiddenform" >

                          <form id="changeprofileimage" method="post" enctype="multipart/form-data" action="{{route('uploadprofileimage',Auth::user()->id)}}">
                              @csrf
                              <div class="form-group">
                                <input class="form-control" type="file"  name="profileimage"/>
                              </div>
                              <input type="hidden" name="_method" value="put">
                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Upload</button>
                               
                          </div>
                          </form>
                          
                               
                       </div>
                      

                    </div>
                 
                </div>
                  @else
                  <div class="row justify-content-center">
                  <form id="uploadprofileimage" method="post" enctype="multipart/form-data" action="{{route('uploadprofileimage',Auth::user()->id)}}">
                    <h3>Upload Profile Picture</h3>
                    @csrf
                    <div class="form-group">
                      <input class="form-control" type="file"  name="profileimage"/>
                    </div>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                  </form>
                </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
   $(document).ready(function () {
    $('#btnshowform').on('click',function(){
      $(this).hide();
      $('#hiddenform').removeClass('d-none');
    });

    $('#cancelbtn').on('click',function(){
       $('#hiddenform').addClass('d-none');
    });

    $('#changeprofileimage').validate({ // initialize the plugin
        rules: {
            profileimage: {
                required: true,
                accept:'image/*'
            },  
        }
    });

     $('#uploadprofileimage').validate({ // initialize the plugin
        rules: {
            profileimage: {
                required: true,
                accept:'image/*'
            },  
        }
    });

    
});
</script>

@endsection