@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">{{ __('messages.home') }}</a></span> <span>{{ __('messages.rest') }}</span></p>
              <h1 class="mb-4 bread">{{ __('messages.chalets') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

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
                            <p class="pt-1"><a href="rooms/show/{{ $room->id }}" class="btn-custom px-3 py-2 rounded">{{ __('messages.viewdetails') }}<span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
              
          </div>
      </div>
  </section>

@endsection