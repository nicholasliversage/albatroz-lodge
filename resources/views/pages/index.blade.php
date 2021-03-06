@extends('layout.app')

@section('content')

@if (Session::has('error'))

            <div class="alert alert-danger mt-2">{{ Session::get('error') }} 
            </div>

            @endif

<div class="hero">
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/view-7.jpg);">
          <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
          <div class="col-md-6 ftco-animate">
              <div class="text">
                  <h2>{{ __('messages.morethan') }}</h2>
                <h1 class="mb-3">{{ __('messages.allyear') }}</h1>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/view-9.jpg);">
          <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
          <div class="col-md-6 ftco-animate">
              <div class="text">
                  <h2>Albatroz Lodge &amp; Restaurant</h2>
                <h1 class="mb-3">{{ __('messages.ownhome') }}</h1>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>

<section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <form id="myform" method="POST" action="{{ route('booking.make') }}"  class="booking-form aside-stretch">
               @csrf
                  <div class="row">
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                    <label for="#">{{ __('messages.checkin') }}</label>
                                    <input name="check_in" id="check_in" type="text" class="form-control checkin_date" placeholder="{{ __('messages.checkin') }}">
                                    @if ($errors->has('check_in'))
                                    <span class="text-danger">{{ $errors->first('check_in') }}</span>
                                @endif
                                  </div>
                            </div>
                    </div>
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                    <label for="#">{{ __('messages.checkout') }}</label>
                                    <input name="check_out" id="check_out" type="text" class="form-control checkout_date" placeholder="{{ __('messages.checkout') }}">
                                    @if ($errors->has('check_out'))
                                    <span class="text-danger">{{ $errors->first('check_out') }}</span>
                                @endif
                                  </div>
                            </div>
                    </div>
                    
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">{{ __('messages.guests') }}</label>
                                  <div class="form-field">
                                    <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="guests" id="guests" class="form-control">
                                <option value="1">1 {{ __('messages.adults') }}</option>
                              <option value="2">2 {{ __('messages.adults') }}</option>
                              <option value="3">3 {{ __('messages.adults') }}</option>
                              <option value="4">4 {{ __('messages.adults') }}</option>
                              <option value="5">5 {{ __('messages.adults') }}</option>
                              <option value="6">6 {{ __('messages.adults') }}</option>
                            </select>
                          </div>
                          </div>
                        </div>
                  </div>
                    </div>

                    

                    <div class="col-md d-flex">
                      
                        <div class="form-group d-flex align-self-stretch">
                          <button type="submit" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block">
                            <span>{{ __('messages.cav') }}<small>{{ __('messages.bprice') }}</small></span>
                          </button>
                    </div>
                    </div>
                </div>
   
        
        
            </form>
            </div>
        </div>
    </div>
</section>






    <section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">{{ __('messages.welcome') }} Albatroz Lodge</span>
        <h2 class="mb-4">{{ __('messages.youll') }}</h2>
      </div>
    </div>  
    <div class="row d-flex">
      <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services py-4 d-block text-center">
          <div class="d-flex justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                  <span class="flaticon-reception-bell"></span>
              </div>
          </div>
          <div class="media-body">
            <h3 class="heading mb-3">{{ __('messages.fservice') }}</h3>
          </div>
        </div>      
      </div>
      <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services active py-4 d-block text-center">
          <div class="d-flex justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                  <span class="flaticon-serving-dish"></span>
              </div>
          </div>
          <div class="media-body">
            <h3 class="heading mb-3">{{ __('messages.gbreakfast') }}</h3>
          </div>
        </div>    
      </div>
      
      
      <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services py-4 d-block text-center">
          <div class="d-flex justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                  <span class="ion-ios-bed"></span>
              </div>
          </div>
          <div class="media-body">
            <h3 class="heading mb-3">{{ __('messages.crooms') }}</h3>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-7 order-md-last d-flex">
                    <div class="img img-1 mr-md-2 ftco-animate" style="background-image: url(images/ab-1.jpg);"></div>
                    <div class="img img-2 ml-md-2 ftco-animate" style="background-image: url(images/view-8.jpg);"></div>
                </div>
                <div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
          <div class="heading-section mb-4 my-5 my-md-0">
              <span class="subheading">{{ __('messages.ab') }} Albatroz Lodge</span>
            <h2 class="mb-4">Albatroz Lodge {{ __('messages.mostrec') }} Tofo</h2>
          </div>
          <p>{{ __('messages.ourexclusive') }}</p>
          <p><a href="/rooms" class="btn btn-secondary rounded">{{ __('messages.vchalets') }}</a></p>
                </div>
            </div> 
        </div>
    </section>

<section class="testimony-section">
  <div class="container">
    <div class="row no-gutters ftco-animate justify-content-center">
        <div class="col-md-5 d-flex">
            <div class="testimony-img aside-stretch-2" style="background-image: url(images/view-8.jpg);"></div>
        </div>
      <div class="col-md-7 py-5 pl-md-5">
          <div class="py-md-5">
              <div class="heading-section ftco-animate mb-4">
                  <span class="subheading">{{ __('messages.reviews') }}</span>
                  <h2 class="mb-0">{{ __('messages.happy') }}</h2>
                </div>
            <div class="carousel-testimony owl-carousel ftco-animate">

              @foreach ($reviews as $review)
              <div class="item">
                <div class="testimony-wrap pb-4">
                  <div class="text">
                    <p class="mb-4">{{ $review->description }}</p>
                  </div>
                  <div class="d-flex">
                      <div class="user-img" style="background-image: url(images/profile-1.jpg)">
                      </div>
                      <div class="pos ml-3">
                          <p class="name">{{ $review->user->name }}</p>
                        <span class="position">{{ __('messages.customer') }}</span>
                      </div>
                    </div>
                </div>
              </div>
              @endforeach
                      
            </div>
          </div>

          <div class="col-md-12 text-center ftco-animate">
            <p><a href="#" class="btn btn-secondary rounded" data-toggle="modal" data-target="#reviewModal">{{ __('messages.leavereview') }}</a></p>
          </div>

      </div>
    </div>
  </div>

  
</section>

<section class="ftco-section ftco-no-pb ftco-room">
    <div class="container-fluid px-0">
        <div class="row no-gutters justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Albatroz {{ __('messages.chalets') }}</span>
        <h2 class="mb-4">{{ __('messages.ourchalets') }}</h2>
      </div>
    </div> 
    <div class="row no-gutters"> 
    @foreach ($rooms as $room )
        
            <div class="col-lg-6">
                <div class="room-wrap d-md-flex ftco-animate">
                    <a href="rooms/show/{{ $room->id }}" class="img" style="background-image: url({{ $room->imgRoom }});">
                    
                    </a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 text-center">
                            <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                            <p class="mb-0"><span class="price mr-1">${{ $room->price }}.00</span> <span class="per">{{ __('messages.priceper') }}</span></p>
                            <h3 class="mb-3"><a href="rooms/show/{{ $room->id }}">{{ $room->name }}</a></h3>
                            <p class="pt-1"><a href="rooms/show/{{ $room->id }}" class="btn-custom px-3 py-2 rounded">{{ __('messages.viewdetails') }} <span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            
        </div>
    </div>
</section>



    
    

    
    <section class="ftco-section ftco-menu bg-light">
        <div class="container-fluid px-md-4">
            <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">{{ __('messages.rest') }}</span>
        <h2>{{ __('messages.ourspecials') }}</h2>
      </div>
    </div>
    <div class="row">

      @foreach ($dishes as $dish)
          
     @if ($dish->special)
<div class="col-lg-6 col-xl-6 d-flex">
    <div class="pricing-entry rounded d-flex ftco-animate">
        <div class="img" style="background-image: url({{ $dish->imgDish }});"></div>
        <div class="desc p-4">
            <div class="d-md-flex text align-items-start">
                <h3><span>{{ $dish->name }}</span></h3>
                <span class="price">${{ $dish->price }}.00</span>
            </div>
            <div class="d-block">
                <p>{{ $dish->description }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
</div>
        
        
        <div class="col-md-12 text-center ftco-animate">
            <p><a href="/restaurant" class="btn btn-secondary rounded ">{{ __('messages.allmenu') }}</a></p>
        </div>
    </div>
        </div>
    </section>


<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">{{ __('messages.readblog') }}</span>
        <h2>{{ __('messages.recentblog') }}</h2>
      </div>
    </div>
    <div class="row d-flex">

      @foreach ($blogs as $blog)
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="/blogs/show/{{ $blog->id }}" class="block-20 rounded" style="background-image: url('{{ $blog->img1 }}');">
          </a>
          <div class="text mt-3 text-center">
              <div class="meta mb-2">
              <div><a>{{ $blog->created_at }}</a></div>
              
              <div><a  class="meta-chat"><span class="icon-chat"></span> {{ $blog->comments->count() }}</a></div>
            </div>
            <h3 class="heading"><a href="/blogs/show/{{ $blog->id }}">{{ $blog->title }}</a></h3>
          </div>
        </div>
      </div>
      @endforeach
      
      
      
    </div>
  </div>
</section>

<section class="instagram">
  <div class="container-fluid">
    <div class="row no-gutters justify-content-center pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">{{ __('messages.photos') }}</span>
        <h2><span>{{ __('messages.gallery') }}</span></h2>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-sm-12 col-md ftco-animate">
        <a href="images/insta-1.jpg" class="insta-img image-popup" style="background-image: url(images/insta-1.jpg);">
          <div class="icon d-flex justify-content-center">
            <span class="icon-instagram align-self-center"></span>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md ftco-animate">
        <a href="images/insta-2.jpg" class="insta-img image-popup" style="background-image: url(images/insta-2.jpg);">
          <div class="icon d-flex justify-content-center">
            <span class="icon-instagram align-self-center"></span>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md ftco-animate">
        <a href="images/insta-3.jpg" class="insta-img image-popup" style="background-image: url(images/insta-3.jpg);">
          <div class="icon d-flex justify-content-center">
            <span class="icon-instagram align-self-center"></span>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md ftco-animate">
        <a href="images/insta-4.jpg" class="insta-img image-popup" style="background-image: url(images/insta-4.jpg);">
          <div class="icon d-flex justify-content-center">
            <span class="icon-instagram align-self-center"></span>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md ftco-animate">
        <a href="images/insta-5.jpg" class="insta-img image-popup" style="background-image: url(images/insta-5.jpg);">
          <div class="icon d-flex justify-content-center">
            <span class="icon-instagram align-self-center"></span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

