@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">{{ __('messages.bookings') }}s</h2>
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">{{ __('messages.addnew') }} {{ __('messages.bookings') }}</button>
      </div>
      <br>


      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  {{ __('messages.bookingstable') }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.customer') }} </th>
                                    <th>Email</th>
                                    <th>{{ __('messages.phone') }}</th>
                                    <th>{{ __('messages.chalets') }}</th>
                                    <th>{{ __('messages.persons') }}</th>
                                    <th>{{ __('messages.checkin') }}</th>
                                    <th>{{ __('messages.checkout') }}</th>
                                    <th>{{ __('messages.options') }}</th>
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
                                        <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-primary">{{ __('messages.edit') }}</button>
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
          <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.new') }} {{ __('messages.bookings') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('reservation.save') }}">
                @csrf
            <div class="form-group">
                
                <label for="sel1">{{ __('messages.customer') }}:</label>
                <select class="form-control" name="client" id="client">
                  @foreach ($users as $user )
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="sel1">{{ __('messages.chalets') }}:</label>
                <select class="form-control" name="chalet" id="chalet">
                    @foreach ($rooms as $room )
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="guests">{{ __('messages.customer') }}s:</label>
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
                        <label for="cin">{{ __('messages.checkin') }}</label>
                      <div class="input-group date" data-provide="datepicker" style="width:300px; display:table">
                          <input id="cin" name="cin" type="text" class="form-control" placeholder="MM/DD/YYYY" style="display:table-cell; width:100%">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cout">{{ __('messages.checkout') }}</label>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
              </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>

  
@endsection


  