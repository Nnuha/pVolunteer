@extends('layouts.admin')

@section('content')

<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Volunteers!</h1>
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
                List
                @foreach ($events as $event)
                {{$event->event_name}}
               
                </h3>
               
                <div class="card-body">
                    <hr>
                            <table class="table table-bordered">
                                <thead>                  
                                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Volunteer Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach ($event->users as $user)
                                    <tr>
                                        <td>{{$loop->index +1 }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr> 
                                  
                                  @endforeach
                                </tbody>
                            </table>
                 </div>
                 @endforeach
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
    