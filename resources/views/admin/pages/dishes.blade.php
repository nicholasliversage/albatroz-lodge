@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')
<div id="page-wrapper">

    <div >
        <h2 style="text-align:center;">Menu</h2>
        @if ( Auth::user()->user_type == 'Administrator')
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">{{ __('messages.addnew') }} {{ __('messages.dish') }}</button>
        @endif
      </div>
      <br>

          @foreach ($dishes as $dish)
              
         <form style="display:inline-block;" method="POST" action="{{ route('dish.delete',$dish->id) }}">
          @csrf
         <div class="card" style="width:400px;margin-left:50px;">
            <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $dish->imgDish }}" alt="Card image">
            <div class="card-body" style="margin-left:10px;">
              <h4 class="card-title">{{ $dish->name }}</h4>
              <p style="height: 70px" class="card-text">{{ $dish->description }}</p>
             <p> <span>${{ $dish->price }}.00</span><p>
               @if ( Auth::user()->user_type == 'Administrator')
               <a href="#" data-toggle="modal" data-target="#modalFormEdit" class="btn btn-primary">{{ __('messages.edit') }}</a>
               <button onclick="return confirm('Are you sure?'); type="submit" class="btn btn-danger" href="#" >Delete</button>
               @endif
              
            </div>
          </div>
         </form>
    @endforeach




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







    <div class="modal fade" id="modalFormEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $dish->name }}</h5>
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
@endsection