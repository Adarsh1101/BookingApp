@extends('layouts.auth')
@section('css')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css">

@endsection
@section('content')
 <div class="page-header">
              <h3 class="page-title"> Events </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
 
            <div class="row">
              <div class="row">
                <div class="col-2 mb-3">
                  <a href="{{route('events.create')}}" class="btn btn-info">New Event</a>
                </div>
              </div>
              <div class="container">
                @if(session('success_msg'))
                <div class="alert alert-success" role="alert">
                <strong> Good Job !</strong> {{session()->get('success_msg')}}
                </div>
                @endif
                @if(session('error_msg'))
                <div class="alert alert-danger" role="alert">
                <strong> Good Job !</strong> {{session()->get('error_msg')}}
                </div>
                @endif
              </div>
             
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      @if(count($events) > 0)
                      <table class="table table-striped" id="myTable">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Max Attendance</th>
                            <th>Type</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($events as $data)
                          <tr>
                            <td>
                                  {{$loop->iteration}}
                            </td>
                            <td>
                                  {{$data->name}}
                            </td>
                            <td>
                                  {{$data->location }}
                            </td>
                          
                            <td>
                                  {{$data->price }}
                            </td>
                            <td>
                                  {{$data->max_attendees }}
                            </td>
                              <td>
                              @if($data->type == 'FREE')
                              <span class="badge badge-primary">{{$data->type}}</span>
                              @elseif($data->type == 'PAID')
                              <span class="badge badge-success">{{$data->type}}</span>
                              @else
                              <span class="badge badge-info">{{$data->type}}</span>
                              @endif
                                 
                            </td>
                            <td style="display:flex">
                              <a href="" class="btn btn-success">Show</a>&nbsp;
                              <a href="" class="btn btn-info">Edit</a>&nbsp;
                              <form action ="" >
                                <button class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                           
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                      @else 
                        <p class="text-danger text-bold">No Event Created Yet.</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
             
            </div>

@endsection
@section('script')

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script>
  let table = new DataTable('#myTable');
</script>


@endsection
