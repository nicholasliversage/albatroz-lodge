@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">Bookings</h2>
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">Add New Booking</button>
      </div>
      <br>


      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bookings Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Chalet</th>
                                    <th>Persons</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr class="odd gradeX">
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->user->email }}</td>
                                    <td>{{ $booking->user->phone }}</td>
                                    <td>{{ $booking->room->name }}</td>
                                    <td class="center">{{ $booking->guests }}</td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out}}</td>
                                    <td>
                                        <form action="{{ route('request.delete',$booking->id) }}" method="post">
                                            @csrf
                                        <button onclick="return confirm('Are you sure you want to delete this booking?');" type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>



<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Booking</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('reservation.save') }}">
                @csrf
            <div class="form-group">
                
                <label for="sel1">Select Client:</label>
                <select class="form-control" name="client" id="client">
                  @foreach ($users as $user )
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="sel1">Select Chalet:</label>
                <select class="form-control" name="chalet" id="chalet">
                    @foreach ($rooms as $room )
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="guests">Number of Guests:</label>
                <select class="form-control" name="guests" id="guests">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>

              <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                        <label for="cin">Check-in Date</label>
                      <div class="input-group date" data-provide="datepicker" style="width:300px; display:table">
                          <input id="cin" name="cin" type="text" class="form-control" placeholder="MM/DD/YYYY" style="display:table-cell; width:100%">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cout">Check-out Date</label>
                        <div class="input-group date" data-provide="datepicker" style="width:300px; display:table">
                            <input name="cout" id="cout" type="text" class="form-control" placeholder="MM/DD/YYYY" style="display:table-cell; width:100%">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>

  
@endsection


  