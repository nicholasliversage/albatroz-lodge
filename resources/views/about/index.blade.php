@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">{{ __('messages.home') }}</a></span> <span>{{ __('messages.about') }}</span></p>
              <h1 class="mb-4 bread">{{ __('messages.ab') }} Albatroz</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">{{ __('messages.welcome') }} Albatroz</span>
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
                      <div class="img img-2 ml-md-2 ftco-animate" style="background-image:  url(images/view-8.jpg);"></div>
                  </div>
                  <div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
            <div class="heading-section mb-4 my-5 my-md-0">
                <span class="subheading">{{ __('messages.ab') }} Albatroz</span>
              <h2 class="mb-4">Albatroz {{ __('messages.mostrec') }} Tofo</h2>
            </div>
            <p>{{ __('messages.nestling') }}

            {{ __('messages.accomodation') }}</p>
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
                  <p><a href="#" class="btn btn-secondary rounded" data-toggle="modal" data-target="#reviewModal">Leave a Review</a></p>
                </div>
      
            </div>
          </div>
        </div>
      
        
      </section>
      
      <section class="instagram ftco-section ftco-no-pb">
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