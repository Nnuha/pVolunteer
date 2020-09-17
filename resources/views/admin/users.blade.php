@extends('layouts.admin')

@section('content')

<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Admin!</h1>
        @include('inc.messages')
      </div>
    </div>
  </div>
</div>



<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                List Users
               
                </h3>
               
                <div class="card-body">
                    <hr>
                            <table class="table table-bordered">
                                <thead>                  
                                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th>User Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $user)
                                  <tr>
                                    <td>{{$loop->index +1 }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{ route('admin.view-user', $user->id)}}">View</a></td>
                                   
                                </tr> 
                                  @endforeach
                                 
                                   
                                  
                                  
                                </tbody>
                            </table>
                 </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
    