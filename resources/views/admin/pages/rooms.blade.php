@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">{{ __('messages.chalets') }}</h2>
        @if ( Auth::user()->user_type == 'Administrator')
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">{{ __('messages.addnew') }} </button>
        @endif
      </div>
      <br>
      @foreach ($rooms as $room)
              
     
      <div class="card" style="display:inline-block; width:400px;margin-left:60px;">
         <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $room->imgRoom }}" alt="Card image">
        
         <div class="card-body" style="margin-left:10px;">
          <form method="POST" action="{{ route('room.delete',$room->id) }}">
            @csrf
           <h4 class="card-title">{{ $room->name }}<span> - ({{ $room->rooms }} {{ __('messages.availablerooms') }})</span></h4>
           <p style="height: 100px" class=" card-text">{{ $room->description }}</p>
           <div class="d-md-flex mt-5 mb-5">
            <ul class="list">
            </ul>
            <ul class="list ml-md-5">
                <li><span>Max:</span> {{ $room->persons }} {{ __('messages.persons') }}</li>

                @if ($room->view == false)
                <li><span>{{ __('messages.view') }}:</span> {{ __('messages.noseaview') }}</li>
                @else
                <li><span>{{ __('messages.view') }}:</span> {{ __('messages.seaview') }}</li>
                @endif
                <li><span>{{ __('messages.beds') }}:</span> {{ $room->bed }}</li>
            </ul>
        </div>
          <p> <span>${{ $room->price }}.00 {{ __('messages.priceper') }}</span><p>
            @if ( Auth::user()->user_type == 'Administrator')
            <a href="#" data-toggle="modal"  data-target="#modalFormEdit{{ $room->id }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
           <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger" href="#" >Delete</button>
            @endif
          </form>
         </div>
         
       </div>

 @endforeach
 
</div>





  <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.new') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('room.add') }}" id="registerForm">
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
                    <label for="rooms">{{ __('messages.availablerooms') }}:</label>
                        <input id="rooms" type="number" class="form-control" name="rooms" value="{{ old('rooms') }}" required autocomplete="rooms">
                        @if ($errors->has('rooms'))
                        <span class="text-danger">{{ $errors->first('rooms') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="persons">Max {{ __('messages.persons') }}:</label>
                    <select class="form-control" name="persons" id="persons">
                      <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="rooms">{{ __('messages.beds') }}:</label>
                        <input id="beds" type="number" class="form-control" name="beds" value="{{ old('beds') }}" required autocomplete="beds">
                        @if ($errors->has('beds'))
                        <span class="text-danger">{{ $errors->first('beds') }}</span>
                    @endif
                </div>

                <div class="form-group">
                  <label for="price">{{ __('messages.price') }}:</label>
                      <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="price">
                      @if ($errors->has('price'))
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
              </div>

              <div class="form-group">
                <label for="imgRoom">{{ __('messages.image') }}:</label>
                <input type="file" id="imgRoom" name="imgRoom" class="form-control">
            </div>


              <div class="form-group">
                <label for="image1">{{ __('messages.image') }} 1:</label>
                <input type="file" id="image1" name="image1" class="form-control">
            </div>

            <label >{{ __('messages.addimages') }}</label>


            <div class="form-group">
              <label for="image2">{{ __('messages.image') }} 2:</label>
              <input type="file" id="image2" name="image2" class="form-control">
          </div>

          <div class="form-group">
            <label for="image3">{{ __('messages.image') }} 3:</label>
            <input type="file" id="image3" name="image3" class="form-control">
        </div>
                
              <div class="form-group">
                <label for="view">{{ __('messages.view') }}:</label>
                <select class="form-control" name="view" id="view">
                  <option  value="1">{{ __('messages.seaview') }}</option>
                  <option value="0">{{ __('messages.noseaview') }}</option>
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



  @foreach ($rooms as $room)
  <div  class="modal fade" id="modalFormEdit{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $room->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('room.edit',$room->id) }}" id="registerFormedit">
                @csrf

                

                <div class="form-group">
                    <label for="name" ">{{ __('messages.name') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $room->name }}"  autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">{{ __('messages.description') }}</label>
                        <textarea id="description"  class="form-control" name="description" value="{{ $room->description }}" required autocomplete="description">{{ $room->description }}</textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="rooms">{{ __('messages.availablerooms') }}:</label>
                        <input id="rooms" type="number" class="form-control" name="rooms" value="{{ $room->rooms }}" required autocomplete="rooms">
                        @if ($errors->has('rooms'))
                        <span class="text-danger">{{ $errors->first('rooms') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="persons">Max {{ __('messages.persons') }}:</label>
                    <select class="form-control" name="persons" id="persons">
                      <option value="{{ $room->persons }}" hidden selected>
                        {{ $room->persons }}</option>
                      <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="rooms">{{ __('messages.beds') }}:</label>
                        <input id="beds" type="number" class="form-control" name="beds" value="{{ $room->bed }}" required autocomplete="beds">
                        @if ($errors->has('beds'))
                        <span class="text-danger">{{ $errors->first('beds') }}</span>
                    @endif
                </div>

                <div class="form-group">
                  <label for="price">{{ __('messages.price') }}:</label>
                      <input id="price" type="number" class="form-control" name="price" value="{{ $room->price }}" required autocomplete="price">
                      @if ($errors->has('price'))
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
              </div>

              <div class="form-group">
                <label for="imgRoom">{{ __('messages.image') }}:</label>
                <input value="{{ $room->imgRoom }}"  type="file" id="imgRoom" name="imgRoom" class="form-control">
            </div>


              <div class="form-group">
                <label for="image1">{{ __('messages.image') }} 1:</label>
                <input type="file" value="{{ $room->img1 }}" id="image1" name="image1" class="form-control">
            </div>

            <label >{{ __('messages.addimages') }}</label>


            <div class="form-group">
              <label for="image2">{{ __('messages.image') }} 2:</label>
              <input type="file" value="{{ $room->img2 }}" id="image2" name="image2" class="form-control">
          </div>

          <div class="form-group">
            <label for="image3">{{ __('messages.image') }} 3:</label>
            <input type="file" value="{{ $room->img3 }}" id="image3" name="image3" class="form-control">
        </div>
                
              <div class="form-group">
                <label for="view">{{ __('messages.view') }}:</label>
                <select class="form-control" name="view" id="view">
                  <option value="{{ $room->view }}" selected hidden>
                  @if ($room->view)
                  {{ __('messages.seaview') }}
                  @else
                  {{ __('messages.noseaview') }}
                  @endif  
                  
                  </option>
                  <option  value="1">{{ __('messages.seaview') }}</option>
                  <option value="0">{{ __('messages.noseaview') }}</option>
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
@endsection

<script type="text/javascript">



</script>