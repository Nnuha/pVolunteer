@extends('layouts.user')

@section('content')


<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Voluntering Details</h1>
          </div>
        </div>
      </div>
</div>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Event name : {{$event->event_name}} </h3>
          @if($event->event_status == 'Active')
                      <span class="badge badge-warning float-right">{{$event->event_status}}</span></a>
                  @else
                      <span class="badge badge-danger float-right">{{$event->event_status}}</span></a>
          @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <dl class="row">
            <dt class="col-sm-4"><img class="img-fluid pad" text-align: center; display: block;  src="/storage/event_images/{{$event->event_image}}" width="250" height="124"></dt>
            <dd class="col-sm-8"><p>{{$event->event_details}} </p>
             <p><b> Mark your calendar the event will be held on : </b>{{$event->event_date}} </p>
             <p><b> At the : </b>{{$event->event_location}} </p>
             <p><b>{{$event->note}} </b></p>
             <p><b> Availabilty :</b> {{$event->event_availability}} </p>
             
             <hr>
              <small> Written on {{$event->created_at}}</small> 
              <hr> <!-- separation link -->
              @if ($event->event_status == 'Active')
                <a href="{{route('user.event.register',$event->id)}}" class="btn btn-primary">APPLY NOW !</a>
            
                @else
                <a href="{{route('user.event.register',$event->id)}}" class="btn btn-primary disabled" >APPLY NOW !</a>
              @endif
              

             
            
            </dd>  
          </dl>
        </div>
       
      </div>
     
    </div>

  </div>
</div>


















@endsection