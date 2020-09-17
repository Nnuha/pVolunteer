@extends('layouts.admin')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Create Event</h1>
            @include('inc.messages')
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Event </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

             
              <form class="form-horizontal" action="{{route('admin.event.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> Event Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="event_name"  required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="details" class="col-sm-2 col-form-label">Event Details</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="event_details" type="text" required="required"></textarea>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label for="note" class="col-sm-2 col-form-label"> Event Note</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="event_note"  required="required">
                      </div>
                    </div>


                  <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label">Event Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="event_date" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="event_location" class="col-sm-2 col-form-label">Event Location</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="event_location" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="event_availability" class="col-sm-2 col-form-label">Volunteer Required</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="event_availability" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                   <label for="event_image" class="col-sm-2 col-form-label">Event Picture</label>
                       <div class="col-lg-10"></label>
                          <input type="file" id="event_image" name="event_image" required="required" ><br/>       
                         </div>
                  </div>


         
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Post</button>
                </div>
             
              </form>
             
            </div>
           
            </div>
         
          <div class="col-md-6">

          </div>
       
        </div>
      
      </div>
    </section>


@endsection

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>