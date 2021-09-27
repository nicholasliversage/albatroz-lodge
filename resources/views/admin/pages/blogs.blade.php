@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">Blogs</h2>
        @if ( Auth::user()->user_type == 'Administrator')
        <button data-toggle="modal" data-target="#modalForm" type="button" class="btn btn-success">{{ __('messages.addnew') }} Blog</button>
        @endif
      </div>
      <br>

      @foreach ($blogs as $blog)
              
     
      <div class="card" style="width:400px;display:inline-block;margin-left:50px;">
        <form method="POST" action="{{ route('blog.remove',$blog->id) }}">
          @csrf
         <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $blog->img1 }}" alt="Card image">
        
         <div class="card-body" style="margin-left:10px;">
           <h4 class="card-title">{{ $blog->title }}</h4>
           <h4 style="font-size: 18px; font-weight:bold; height:200px;">{{ $blog->subject }}</h4> 

           <p style="height:200px;" class="card-text">{{ $blog->description }}</p>
           
          <p> <span>{{ __('messages.comments') }}: {{ $blog->comments->count() }}</span><p>
            @if ( Auth::user()->user_type == 'Administrator')
           <a href="#" data-toggle="modal" data-target="#modalFormEdit" class="btn btn-primary">{{ __('messages.edit') }}</a>
           <button onclick="return confirm('Are you sure?');" class="btn btn-danger" type="submit" >Delete</button>
            @endif
          </div>
        </form>
       </div>

 @endforeach
</div>




<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.new') }} Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" action="{{ route('blog.add') }}" id="registerForm">
              @csrf

              

              <div class="form-group">
                  <label for="name" >{{ __('messages.title') }}</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
              </div>

              <div class="form-group">
                <label for="subject" >{{ __('messages.subject') }}</label>
                    <textarea id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}"  autocomplete="name" autofocus></textarea>
                    @if ($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
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
        <h5 class="modal-title" id="exampleModalLabel">{{ $blog->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" action="{{ route('blog.edit', $blog->id) }}" id="registerForm">
              @csrf

              

              
              <div class="form-group">
                <label for="name" >{{ __('messages.title') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $blog->title }}"  autocomplete="name" autofocus>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
              <label for="subject" >{{ __('messages.subject') }}</label>
                  <textarea id="subject" type="text" class="form-control" name="subject" value="{{ $blog->subject }}"  autocomplete="name" autofocus>{{ $blog->subject }}</textarea>
                  @if ($errors->has('subject'))
                  <span class="text-danger">{{ $errors->first('subject') }}</span>
              @endif
          </div>

            <div class="form-group">
                <label for="description">{{ __('messages.description') }}</label>
                    <textarea id="description"  class="form-control" name="description" value="{{ $blog->description }}" required autocomplete="description">{{ $blog->description }}</textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

          <div class="form-group">
            <label for="image1">{{ __('messages.image') }} 1:</label>
            <input value="{{ $blog->img1 }}" type="file" id="image1" name="image1" class="form-control">
        </div>

        <label >{{ __('messages.addimages') }}</label>


        <div class="form-group">
          <label for="image2">{{ __('messages.addimages') }} 2:</label>
          <input value="{{ $blog->img2 }}" type="file" id="image2" name="image2" class="form-control">
      </div>

      <div class="form-group">
        <label for="image3">{{ __('messages.addimages') }} 3:</label>
        <input value="{{ $blog->img3 }}" type="file" id="image3" name="image3" class="form-control">
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