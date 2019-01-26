@extends('layouts.app')


@php($noofuser = 0)



@foreach($user as $uservalue)
    @php($noofuser = $uservalue->usercount)
@endforeach

@php($noofproduct = 0)

@foreach($product as $productvalue)
    @php($noofproduct = $productvalue->proudctcount)
@endforeach



@section('content')

    <div class="row justify-content-center">
         @include('sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <a  class="col-md-3">
                            <div class="card">
                            <div class="card-header text-center">Total Product</div>
                              <div class="card-body">
                                <span class="d-block text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </span>
                               <h2 class="text-center" style="padding-top:20px;"> {{$noofproduct}}</h2>
                              </div>
                            </div>
                        </a>
                        <a  class="col-md-3">
                            <div class="card">
                            <div class="card-header text-center">Total Users</div>
                              <div class="card-body">
                                <span class="text-center d-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></span>
                                <h2 class="text-center" style="padding-top:20px;"> {{$noofuser}}</h2>
                              </div>
                            </div>
                        </a>
                    </div>
                          
                  </div>

                   
                </div>
            </div>
        </div>
    </div>

@endsection
