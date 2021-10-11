@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')
<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div id="page-wrapper">

    <div >
        <h2 style="text-align:center;">Menu</h2>
        @if ( Auth::user()->user_type == 'Administrator')
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">{{ __('messages.addnew') }} {{ __('messages.dish') }}</button>
        @endif
        
        <!-- Default switch -->
<div class="switch" style="float: right;margin-right:60px;">
<label>
  <input id="flexSwitchCheckDefault" type="checkbox" checked>
  <span class="slider round"></span> 
</label>
</div>
<label style="float: right;margin-right:10px;margin-top:10px;" class="form-check-label" for="flexSwitchCheckDefault">Toggle View</label>

      </div>
      <br>
          
      <div id="card">
          @foreach ($dishes as $dish)
              
         <form style="display:inline-block;" method="POST" action="{{ route('dish.delete',$dish->id) }}">
          @csrf
         <div class="card"  style="width:400px;margin-left:50px;">
            <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $dish->imgDish }}" alt="Card image">
            <div class="card-body" style="margin-left:10px;">
              <h4 class="card-title">{{ $dish->name }}</h4>
              <p style="height: 70px" class="card-text">{{ $dish->description }}</p>
             <p> <span>${{ $dish->price }}.00</span><p>
               @if ( Auth::user()->user_type == 'Administrator')
               <a href="#" data-toggle="modal" data-target="#modalFormEdit{{ $dish->id }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
               <button onclick="return confirm('Are you sure?'); type="submit" class="btn btn-danger" href="#" >Delete</button>
               @endif
              
            </div>
          </div>
         </form>
    @endforeach
      </div>


      <div id="table" hidden>
        <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      {{ __('messages.dishes') }}
                  </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                  <tr>
                      <th>{{ __('messages.dish') }}</th>
                      <th>{{ __('messages.description') }}</th>
                      <th>{{ __('messages.category') }}</th>
                      <th>{{ __('messages.price') }}</th>
                      <th>{{ __('messages.options') }}</th>

                  </tr>
              </thead>
              <tbody>
                @foreach ($dishes as $dish)           
                  <tr id="dish{{ $dish->id }}" class="odd gradeX">
                      
                      <td>{{ $dish->name }}</td>
                      <td>{{ $dish->description}}</td>
                      <td>{{ $dish->category }}</td>
                      <td class="center">{{ $dish->price }}.00</td>
                     
                      <td>
                        <form  method="POST" action="{{ route('dish.delete',$dish->id) }}">
                          @csrf
                          @if ( Auth::user()->user_type == 'Administrator')
                          <a type="button" href="#" data-id ={{ $dish->id }} data-toggle="modal" data-target="#modalFormEdit{{ $dish->id }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
                          <button onclick="return confirm('Are you sure?'); type="submit" class="btn btn-danger" href="#" >Delete</button>
                          @endif
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


    <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.new') }} {{ __('messages.dish') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" enctype="multipart/form-data" action="{{ route('dish.add') }}" id="registerForm">
                  @csrf
  
                  
  
                  <div class="form-group">
                      <label for="name" ">{{ __('messages.name') }}</label>
                          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                          @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                  </div>
  
                  <div class="form-group">
                      <label for="description">{{ __('messages.description') }}</label>
                          <textarea id="description"  class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                          @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                      @endif
                  </div>
  
                  <div class="form-group">
                    <label for="view">{{ __('messages.category') }}:</label>
                    <select class="form-control" name="category" id="category">
                      <option  value="breakfast">{{ __('messages.breakfast') }}</option>
                      <option value="main">{{ __('messages.main') }}</option>
                      <option value="dessert">{{ __('messages.dessert') }}</option>
                    </select>
                  </div>
  
                  <div class="form-group">
                    <label for="price">{{ __('messages.price') }}</label>
                        <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="price">
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
  
                <div class="form-group">
                  <label for="imgDish">{{ __('messages.image') }}</label>
                  <input type="file" id="imgDish" name="imgDish" class="form-control">
              </div>
                  
                <div class="form-group">
                  <label for="view">{{ __('messages.isspecial') }}:</label>
                  <select class="form-control" name="special" id="special">
                    <option  value="1">{{ __('messages.yes') }}</option>
                    <option value="0">{{ __('messages.no') }}</option>
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


   @foreach ($dishes as $dish)
     

    <div class="modal fade" id="modalFormEdit{{ $dish->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5  id="header-text" class="modal-title" id="exampleModalLabel">{{ $dish->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" enctype="multipart/form-data" action="{{ route('dish.edit',$dish->id) }}" id="registerForm">
                  @csrf
  
                  
  
                  <div class="form-group">
                      <label for="name" ">{{ __('messages.name') }}</label>
                          <input id="name" type="text" class="form-control" name="name" value="{{ $dish->name }}"  autocomplete="name" autofocus>
                          @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                  </div>
  
                  <div class="form-group">
                      <label for="description">{{ __('messages.description') }}</label>
                          <textarea  id="description"  class="form-control" name="description"  value="{{ $dish->description }}" required autocomplete="description">{{ $dish->description }}</textarea>
                          @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                      @endif
                  </div>
  
                  <div class="form-group">
                    <label for="view">{{ __('messages.category') }}:</label>
                    <select class="form-control" name="category" id="category">
                      <option value="{{ $dish->category }}" selected  hidden>
                        {{ $dish->category }}
                      </option>
                      <option  value="breakfast">{{ __('messages.breakfast') }}</option>
                      <option value="main">{{ __('messages.main') }}</option>
                      <option value="dessert">{{ __('messages.dessert') }}</option>
                    </select>
                  </div>
  
                  <div class="form-group">
                    <label for="price">{{ __('messages.price') }}:</label>
                        <input id="price" type="number" class="form-control" name="price" value="{{ $dish->price }}" required autocomplete="price">
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
  
                <div class="form-group">
                  <label for="imgDish">{{ __('messages.image') }}:</label>
                  <input value="{{ $dish->imgDish }}" type="file" id="imgDish" name="imgDish" class="form-control">
              </div>
                  
                <div class="form-group">
                  <label for="view">{{ __('messages.isspecial') }}:</label>
                  <select class="form-control" name="special" id="special">
                    <option value="{{ $dish->special }}" selected  hidden>
                      @if ($dish->special)
                      {{ __('messages.yes') }}
                      @else
                      {{ __('messages.no') }}
                      @endif
                  </option>
                    <option  value="1">{{ __('messages.yes') }}</option>
                    <option value="0">{{ __('messages.no') }}</option>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#flexSwitchCheckDefault").click(function(){
    $("#card").toggle();
    $("#table").toggle();
  });
});
</script>
@endsection