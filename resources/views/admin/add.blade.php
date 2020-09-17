@extends('layouts.admin')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1> Add Admin</h1>
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
                <h3 class="card-title">User profile :) </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
              <form class="form-horizontal" action="{{route('admin.add',$user->id)}}" method="POST">
              @csrf

                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" value="{{$user->email}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="ic" class="col-sm-2 col-form-label">Identification Number</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="ic" value="{{$user->ic}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
        
                      <textarea class="form-control" rows="3" name="address" type="text" >{{$user->address}} </textarea>
                    </div>
                  </div>
                  

              
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update </button>
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
<script type="text/javascript">
    document.title = `{{$user['name'] }}'s profile`;
</script>