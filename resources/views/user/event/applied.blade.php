@extends('layouts.user')
@section('content')

<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Joined Event</h1>
            @include('inc.messages')
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
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th style="width: 10px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                  @foreach ($events as $event)
                                        <tr>
                                            <td>{{$loop->index +1 }}</td>
                                            <td>{{$event->event_name}}</td>
                                            <td>{{$event->event_date}}</td>
                                            <td>
                                              <form method="POST" action="{{ route('user.event.destroy', $event->id) }}">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Unjoined!</button >
                                            </form>
                                            </td>
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

