@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">Blogs</h2>
        <button type="button" class="btn btn-success">Add New Blog</button>
      </div>
      <br>

      @foreach ($blogs as $blog)
              
     
      <div class="card" style="width:400px">
         <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $blog->img1 }}" alt="Card image">
        
         <div class="card-body" style="margin-left:10px;">
           <h4 class="card-title">{{ $blog->title }}</h4>
           <h4 style="font-size: 18px; font-weight:bold;">{{ $blog->subject }}</h4> 

           <p class="card-text">{{ $blog->description }}</p>
           
          <p> <span>Comments: {{ $blog->comments->count() }}</span><p>
           <a href="#" class="btn btn-primary">Edit</a>
           <a class="btn btn-danger" href="#" >Delete</a>
         </div>
       </div>

 @endforeach
</div>


      @endsection