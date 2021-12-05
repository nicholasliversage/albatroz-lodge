@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">{{ __('messages.users') }}</h2>
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">{{ __('messages.addnew') }} {{ __('messages.user') }}</button>
      </div>
      <br>


      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ __('messages.users') }} {{ __('messages.table') }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>Email</th>
                                    <th>{{ __('messages.user') }} Type</th>
                                    <th>{{ __('messages.phone') }}</th>
                                    <th>Nr {{ __('messages.reservations') }}</th>
                                    <th>{{ __('messages.options') }}</th>
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
                                    <form action="{{ route('user.remove',$user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure ?');" class="btn btn-danger">Delete</button>
                                    
                                        <button data-toggle="modal" data-target="#modalFormEdit{{ $user->id }}"  type="button" class="btn btn-primary">{{ __('messages.edit') }}</button>
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
          <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.addnew') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('user.create') }}" id="registerForm">
                @csrf

                <input name="register" type="hidden" value="1">

                <div class="form-group">
                    <label for="nameInput" ">{{ __('messages.name') }}</label>
                        <input id="nameInput" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="emailInput">{{ __('E-Mail ') }}</label>
                        <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phoneInput">{{ __('messages.phone') }}</label>
                        <input id="phoneInput" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="guests">{{ __('messages.user') }} {{ __('messages.type') }}:</label>
                    <select class="form-control" name="type" id="type">
                        @if ( Auth::user()->user_type == 'Administrator')
                      <option value="Administrator">{{ __('messages.administrator') }}</option>
                      <option value="Manager">{{ __('messages.manager') }}</option>
                        @endif
                      <option value="Client">{{ __('messages.customer') }}</option>
                    </select>
                  </div>

                <div class="form-group">
                    <label for="passwordInput" >{{ __('Password') }}</label>

                    
                        <input id="passwordInput" type="password" class="form-control" name="password" required autocomplete="new-password">

                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                   
                </div>

                <div class="form-group">
                    <label for="password-confirm" >{{ __('messages.confirm') }}</label>

                    
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

@if ($users->count() > 0)
    
@foreach ($users as $user )
    

  <div class="modal fade" id="modalFormEdit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('user.edit',$user->id) }}" id="registerForm">
                @csrf

                <input name="register" type="hidden" value="1">

                <div class="form-group">
                    <label for="nameInput" ">{{ __('messages.name') }}</label>
                        <input id="nameInput" type="text" class="form-control" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="emailInput">{{ __('E-Mail') }}</label>
                        <input id="emailInput" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phoneInput">{{ __('messages.phone') }}</label>
                        <input id="phoneInput" type="phone" class="form-control" name="phone" value="{{ $user->phone }}" required autocomplete="phone">
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="guests">{{ __('messages.user') }} {{ __('messages.type') }}:</label>
                    <select class="form-control" name="type" id="type">
                      <option value="{{ $user->user_type }}" hidden selected>{{ $user->user_type }}</option>
                      @if ( Auth::user()->user_type == 'Administrator')
                      <option value="Administrator">{{ __('messages.administrator') }}</option>
                      <option value="Manager">{{ __('messages.manager') }}</option>
                      @endif
                      <option value="Client">{{ __('messages.customer') }}</option>

                    </select>
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
  @endforeach
  @endif
@endsection

 

