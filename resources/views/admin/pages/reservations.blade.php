@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">Users</h2>
        <button type="button" class="btn btn-success">Add New User</button>
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
                                    <td>{{ $booking->rooms->name }}</td>
                                    <td class="center">{{ $booking->guests }}</td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
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
@endsection