@extends('layouts.user')
@section('content')

<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Application Submitted!</h1>
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
                  </h3>
                 
                  <div class="card-body">
                      <hr>
                              <table class="table table-bordered">
                              <thead>                  
                                  <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Application Title</th>
                                  <th>Date</th>
                                  <th style="width: 10px">Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                               
                                @foreach ($application as $application)
                                      <tr>
                                          <td>{{$loop->index +1 }}</td>
                                          <td>{{$application->application_title}}</td>
                                          <td>{{$application->created_at}}</td>
                                          <td>{{$application->application_status}} </td>
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