@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('/images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">{{ __('messages.home') }}</a></span> <span class="mr-2"><a href="/blogs">Blogs</a></span> <span>{{ __('messages.sblog') }}</span></p>
              <h1 class="mb-4 bread">{{ __('messages.sblog') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3">{{ $blog->title }}</h2>
          <p>{{ $blog->subject }}</p>
          <p>
            <div class="col-md-12 ftco-animate">
                    <div class="single-slider owl-carousel">
                        <div class="item">
                            <div class="room-img" style="background-image: url(/{{ $blog->img1 }});"></div>
                        </div>
                        @if ($blog->img2 != null)
                        <div class="item">
                            <div class="room-img" style="background-image: url(/{{ $blog->img2 }});"></div>
                        </div>
                        @endif

                        @if ($blog->img3 != null)
                        <div class="item">
                            <div class="room-img" style="background-image: url(/{{ $blog->img3 }});"></div>
                        </div>
                        @endif
                    </div>
                </div>            
          </p>
          <p>{{ $blog->description }}</p>
          
          <div id="scroll" class="pt-5 mt-5">
            <h3 class="mb-5">{{ __('messages.comments') }}</h3>
             
            @if ($blog->comments->count()>0)
            @foreach ($blog->comments as $comment)
            <div id="display_comment"></div>
            <div class="about-author d-flex p-4 bg-light">
            <div class="desc align-self-md-center">
                <h3>{{ $comment->user->name }}</h3>
                <p>{{ $comment->description }}</p>
              </div>
            </div>
            <br>
              @endforeach
              @else
              <div id="display_comment"></div>
              <div class="about-author d-flex p-4 bg-light">
              <div class="desc align-self-md-center">
                <h3>{{ __('messages.this') }} Blog</h3>
                <p>{{ __('messages.hasnocomments') }}</p>
              </div>
              </div>
            @endif
            
          


          
            <!-- END comment-list -->
            
                          
            
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">{{ __('messages.leavecomment') }}</h3>
              @guest
              <h4 class="mb-5">{{ __('messages.loggedcomment') }}</h4>
              @else
              <form action=" {!! route('blogs.comment',$blog->id) !!}" method="POST" id="comment_form" class="p-5 bg-light">
                @csrf
              
              <div class="form-group">
                <label for="message">{{ __('messages.message') }}</label>
                <textarea name="comment_content" id="comment_content" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                <button  type="submit"  name="submit" id="submit" value="Submit" class="btn py-3 px-4 btn-secondary">
                <i style="display:none;" class="fa fa-refresh fa-spin" ></i><span id="send_btn">{{ __('messages.submit') }}</span> 
                </button>
              </div>

            </form>
              @endguest
             
            </div>
          </div>

        </div> <!-- .col-md-8 -->

        <div class="col-lg-4 sidebar ftco-animate pl-md-5">
        <div class="sidebar-box ftco-animate">
          <h3>Blogs</h3>
          @if ($blogs->count() > 0)
              
         
          @foreach ($blogs as $bg)
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(/{{ $bg->img1 }});"></a>
            <div class="text">
              <h3 class="heading" ><a href="/blogs/show/{{ $bg->id }}">{{ $bg->title }}</a></h3>
              <div class="meta">
                <div><a ><span class="icon-calendar"></span> {{ $bg->created_at }}</a></div>
                <div><a ><span class="icon-chat"></span> {{ $bg->comments->count() }}</a></div>
              </div>
            </div>
          </div>
          @endforeach
         
          @else
          <h3>No other Blogs Available</h3>
          @endif
          
         
        </div>

       

       
      </div>
      </div>     
    </div>
  </section> <!-- .section -->


@endsection
