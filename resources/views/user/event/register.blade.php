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
                    <h3 class="card-title">
                    User Details
                    </h3>
                   
                    <div class="card-body">
                        <hr>
                        
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input class="form-control" value="{{ Auth::user()->name }}" >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input  class="form-control" value="{{ Auth::user()->email}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ic" class="col-sm-2 col-form-label">Identification Number</label>
                                <div class="col-sm-10">
                                <input class="form-control" value="{{ Auth::user()->ic }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                    
                                <textarea class="form-control">{{ Auth::user()->address }}</textarea>
                                </div>
                            </div>
                        
                    </div>

                </div>
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
                    Event Details 
                    </h3>
                         <div class="card-body">
                             <hr>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label"> Event Name</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" value="{{$event->event_name}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="details" class="col-sm-2 col-form-label">Event Details</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" readonly>{{$event->event_details}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Event Date</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" value="{{$event->event_date}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="details" class="col-sm-2 col-form-label">Event Details</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" readonly>{{$event->event_details}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Event Date</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" value="{{$event->event_date}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="event_location" class="col-sm-2 col-form-label">Event Location</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" value="{{$event->event_location}}" readonly>
                                    </div>
                                </div>

                          </div> 
                          @if($event->event_status == 'Closed')
                          
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary disabled" >APPLY NOW</button>
                             </div>
                          

                          @else
                            <form  action="{{route('user.event.storeEventUser')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                                <input type="hidden" name="event_id" value="{{$event->id}}">

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">APPLY NOW</button>
                            </div>
                            </form>
                              
                          @endif
   
                </div>
            </div>
          </div>
        </div> 
</div>



    

@endsection
