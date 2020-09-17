@extends('layouts.user')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Voluntering News</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

     <!-- PRODUCT LIST -->
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if(count($events) >0 )

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Event</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @foreach($events as $event)
                                    <li class="item">
                                        <div class="product-img">
                                        <img src="/storage/event_images/{{$event->event_image}}"  class="img-size-60">
                                        </div>
                                        <div class="product-info">
                                        <a href="{{route('user.event.view-event',$event->id)}}" class="product-title">{{$event->event_name}}
                                            @if($event->event_status == 'Active')
                                                <span class="badge badge-warning float-right">{{$event->event_status}}</span></a>
                                            @else
                                                <span class="badge badge-danger float-right">{{$event->event_status}}</span></a>
                                            @endif

                                            
                                        <span class="product-description">
                                        {{$event->event_date}}
                                        </span>
                                        <span class="product-description">
                                        {{$event->event_note}}
                                        </span>
                                       
                                        </div>
                                    </li>
                                    @endforeach
                                    </ul>
                                </div>
                
                            </div>
             @else

            @endif
                </div>
         </div>
    </div>


@endsection