@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">{{ __('messages.home') }}</a></span> <span>Blogs</span></p>
              <h1 class="mb-4 bread">{{ __('messages.our') }} Blogs</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row d-flex">

        @foreach ($blogs as $blog)
          
      
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="/blogs/show/{{ $blog->id }}" class="block-20 rounded" style="background-image: url('{{ $blog->img1 }}');">
            </a>
            <div class="text mt-3">
                <div class="meta mb-2">
                <div><a >{{ $blog->created_at }}</a></div>
                  <div><a class="meta-chat"><span class="icon-chat"></span> {{ $blog->comments->count() }}</a></div>
              </div>
              <h3 class="heading"><a href="/blogs/show/{{ $blog->id }}">{{ $blog->title }}</a></h3>
              <p>{{ $blog->subject }}</p>
              <a href="/blogs/show/{{ $blog->id }}" class="btn btn-secondary rounded">{{ __('messages.moreinfo') }}</a>
            </div>
          </div>
        </div>
       
        @endforeach

       
        
      
      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection