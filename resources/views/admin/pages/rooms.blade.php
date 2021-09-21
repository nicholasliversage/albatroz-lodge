@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">Chalets</h2>
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">Add New Chalet</button>
      </div>
      <br>
      @foreach ($rooms as $room)
              
     
      <div class="card" style="display:inline-block; width:400px;margin-left:60px;">
         <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $room->imgRoom }}" alt="Card image">
        
         <div class="card-body" style="margin-left:10px;">
          <form method="POST" action="{{ route('room.delete',$room->id) }}">
            @csrf
           <h4 class="card-title">{{ $room->name }}<span> - ({{ $room->rooms }} Available rooms)</span></h4>
           <p style="height: 100px" class=" card-text">{{ $room->description }}</p>
           <div class="d-md-flex mt-5 mb-5">
            <ul class="list">
            </ul>
            <ul class="list ml-md-5">
                <li><span>Max:</span> {{ $room->persons }} Persons</li>

                @if ($room->view == false)
                <li><span>View:</span> No Sea View</li>
                @else
                <li><span>View:</span> Sea View</li>
                @endif
                <li><span>Beds:</span> {{ $room->bed }}</li>
            </ul>
        </div>
          <p> <span>${{ $room->price }}.00 per night</span><p>
           
            <a href="#" data-toggle="modal" data-target="#modalFormEdit" class="btn btn-primary">Edit</a>
           <button onclick="return confirm('Are you sure you want to delete this Chalet?');" type="submit" class="btn btn-danger" href="#" >Delete</button>
           
          </form>
         </div>
         
       </div>

 @endforeach
 
</div>





  <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Chalet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('room.add') }}" id="registerForm">
                @csrf

                

                <div class="form-group">
                    <label for="name" ">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                        <textarea id="description"  class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="rooms">{{ __('Number of rooms:') }}</label>
                        <input id="rooms" type="number" class="form-control" name="rooms" value="{{ old('rooms') }}" required autocomplete="rooms">
                        @if ($errors->has('rooms'))
                        <span class="text-danger">{{ $errors->first('rooms') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="persons">Max Persons:</label>
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
                    <label for="rooms">{{ __('Number of beds:') }}</label>
                        <input id="beds" type="number" class="form-control" name="beds" value="{{ old('beds') }}" required autocomplete="beds">
                        @if ($errors->has('beds'))
                        <span class="text-danger">{{ $errors->first('beds') }}</span>
                    @endif
                </div>

                <div class="form-group">
                  <label for="price">{{ __('Price:') }}</label>
                      <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="price">
                      @if ($errors->has('price'))
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
              </div>

              <div class="form-group">
                <label for="imgRoom">{{ __('Cover Image:') }}</label>
                <input type="file" id="imgRoom" name="imgRoom" class="form-control">
            </div>


              <div class="form-group">
                <label for="image1">{{ __('Image 1:') }}</label>
                <input type="file" id="image1" name="image1" class="form-control">
            </div>

            <label >{{ __('Additional Images(Optional):') }}</label>


            <div class="form-group">
              <label for="image2">{{ __('Image 2:') }}</label>
              <input type="file" id="image2" name="image2" class="form-control">
          </div>

          <div class="form-group">
            <label for="image3">{{ __('Image 3:') }}</label>
            <input type="file" id="image3" name="image3" class="form-control">
        </div>
                
              <div class="form-group">
                <label for="view">View:</label>
                <select class="form-control" name="view" id="view">
                  <option  value="1">Sea View</option>
                  <option value="0">No Sea View</option>
                </select>
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




  <div class="modal fade" id="modalFormEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="name" ">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $room->name }}"  autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                        <textarea id="description"  class="form-control" name="description" value="{{ $room->description }}" required autocomplete="description">{{ $room->description }}</textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="rooms">{{ __('Number of rooms:') }}</label>
                        <input id="rooms" type="number" class="form-control" name="rooms" value="{{ $room->rooms }}" required autocomplete="rooms">
                        @if ($errors->has('rooms'))
                        <span class="text-danger">{{ $errors->first('rooms') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="persons">Max Persons:</label>
                    <select class="form-control" name="persons" id="persons">
                      <option value="{{ $room->persons }}" hidden selected>
                      Change Number of Persons?</option>
                      <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="rooms">{{ __('Number of beds:') }}</label>
                        <input id="beds" type="number" class="form-control" name="beds" value="{{ $room->bed }}" required autocomplete="beds">
                        @if ($errors->has('beds'))
                        <span class="text-danger">{{ $errors->first('beds') }}</span>
                    @endif
                </div>

                <div class="form-group">
                  <label for="price">{{ __('Price:') }}</label>
                      <input id="price" type="number" class="form-control" name="price" value="{{ $room->price }}" required autocomplete="price">
                      @if ($errors->has('price'))
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
              </div>

              <div class="form-group">
                <label for="imgRoom">{{ __('Cover Image:') }}</label>
                <input value="{{ $room->imgRoom }}"  type="file" id="imgRoom" name="imgRoom" class="form-control">
            </div>


              <div class="form-group">
                <label for="image1">{{ __('Image 1:') }}</label>
                <input type="file" value="{{ $room->img1 }}" id="image1" name="image1" class="form-control">
            </div>

            <label >{{ __('Additional Images(Optional):') }}</label>


            <div class="form-group">
              <label for="image2">{{ __('Image 2:') }}</label>
              <input type="file" value="{{ $room->img2 }}" id="image2" name="image2" class="form-control">
          </div>

          <div class="form-group">
            <label for="image3">{{ __('Image 3:') }}</label>
            <input type="file" value="{{ $room->img3 }}" id="image3" name="image3" class="form-control">
        </div>
                
              <div class="form-group">
                <label for="view">View:</label>
                <select class="form-control" name="view" id="view">
                  <option value="{{ $room->view }}" selected hidden>
                    Change View?</option>
                  <option  value="1">Sea View</option>
                  <option value="0">No Sea View</option>
                </select>
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