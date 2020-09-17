@extends('layouts.admin')


@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1> Event</h1>
            
        </div>  
        </div>
      </div>
</section>



<section class="content"> 
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->

            @if(count($events) >0 )
           
            <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recently Added Event</h3>
                        </div>  
                        <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach($events as $event)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="/storage/event_images/{{$event->event_image}}" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                        
                                          <a href="{{route('admin.event.user',$event->id)}}" class="product-title">{{$event->event_name}}
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
</section>
      
@endsection