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
                    Users Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Phone</th>
                                    <th>Nr Reservations</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="odd gradeX">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td class="center">{{ $user->phone }}</td>
                                    <td class="center">{{ $user->bookings->count() }}</td>
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

 

