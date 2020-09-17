@extends('layouts.user')
@section('content')

<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Submit Your Voluntering Proposal!</h1>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif 

        </div>
      </div>
    </div>
</div>



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          Wants to create your own volunteering work?
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <dl class="row">
            <p> Let us help you :) Submit your proposal now. </p> 
          </dl>
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
                Submit Proposal
                </h3>
                     <div class="card-body">
                         <hr>
                         <form class="form-horizontal" action="{{route('user.application.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                              <div class="card-body">
                                <div class="form-group row">
                                  <label for="application_title" class="col-sm-2 col-form-label"> Application Title</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="application_title"  required="required">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                                  </div>
                                </div>
              
                                <input type="file" name="application_proposal">
                  <br>
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
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
