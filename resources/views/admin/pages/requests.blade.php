@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">{{ __('messages.bookingrequests') }}</h2>
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
                                    <th>{{ __('messages.customer') }} {{ __('messages.name') }}</th>
                                    <th>Email</th>
                                    <th>{{ __('messages.phone') }}</th>
                                    
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
                                   
                                    <td class="center">{{ $booking->guests }}</td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out}}</td>
                                    <td>
                                        <form action="{{ route('request.delete',$booking->id) }}" method="post">
                                            @csrf
                                        <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#requestModal">{{ __('messages.save') }}</button>
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

@if ($bookings->count() > 0)
    

 <!-- Modal Example Start-->
 <div id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >{{ __('messages.bookingrequests') }}</h4>
        </div>
        <div class="modal-body"> 
         
          <form id="request-form" method="POST" action="{{ route('booking.save',$booking->id) }}">
           @csrf
            <h3>{{ __('messages.selectchalet') }}:</h3>
              <div class="row">
                  <div class="offset-4 col-sm-8 mt-5">
                      @foreach ($rooms as $room)
                      @if($room->booking != null)
                      @if(($room->booking->has('check_in','<=',$booking->check_in)) && ($room->booking->has('check_out','>=',$booking->check_out)))
                      
                      <input type="checkbox" name="room" value="{{ $room->id }}"> {{ $room->name }} <br>

                      @endif
                      @else
                      <input type="checkbox" name="room" value="{{ $room->id }}"> {{ $room->name }} <br>
                       @endif
                      @endforeach
                      
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('messages.close') }}</button>
                <button type="submit" class="btn btn-success" >{{ __('messages.save') }}</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  
  @endif
<!-- Modal Example End-->

@endsection