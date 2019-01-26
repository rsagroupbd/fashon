@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
         @include('sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Users List</div>

                <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Profile Picture</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                        @php($i=1)
                       @foreach($data as $user)
                         <tr>
                           <th scope="row">{{$i}}</th>
                           <td><img style="height: 50px;width: 50px;" src="{{URL::to('profileimage/'.$user->profile_image)}}" alt="Profile Picture"></td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td><a  href="{{route('user.show',$user->id)}}">View</a>
                          </td>
                         </tr>
                         @php($i++)
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection