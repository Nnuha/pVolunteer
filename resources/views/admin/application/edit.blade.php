 @extends('layouts.admin')
 @section('content')
     
 <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Update</h1>
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
                Submit Proposal
                </h3>
                     <div class="card-body">
                         <hr>
                         <form class="form-horizontal" action="{{route('application.update', [$application])}}" method="POST" > 
                           @csrf
                           @method('PUT')
                              <div class="card-body">
                                <div class="form-group row">
                                  <label for="application_title" class="col-sm-2 col-form-label"> Update Status</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="application_status"  required="required">
                                    
                                  </div>
                                </div>
               
                              <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                              </div>
                            </form>
                     </div>
            </div>
        </div>
      </div>
    </div> 
</div>
</div>

 @endsection