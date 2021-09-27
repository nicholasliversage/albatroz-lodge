@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('/images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">{{ __('messages.home') }}</a></span> <span class="mr-2"><a href="/rooms">{{ __('messages.chalets') }}</a></span> <span>{{ __('messages.chaletsingle') }}</span></p>
              <h1 class="mb-4 bread">{{ __('messages.chaletdetails') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="single-slider owl-carousel">
                        <div class="item">
                            <div class="room-img" style="background-image: url(/{{ $room->img1 }});"></div>
                        </div>
                        @if ($room->img2 != null)
                        <div class="item">
                            <div class="room-img" style="background-image: url(/{{ $room->img2 }});"></div>
                        </div>
                        @endif

                        @if ($room->img3 != null)
                        <div class="item">
                            <div class="room-img" style="background-image: url(/{{ $room->img3 }});"></div>
                        </div>
                        @endif
                    </div>
                </div>
                
            

                 
            </div>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate pl-md-5">
          <div class="sidebar-box">
           <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                    <h2 class="mb-4 ">{{ $room->name }} <span style="color: #007bff;"> - ({{ $room->rooms }} {{ __('messages.availablerooms') }})</span></h2>
                          <p>{{ $room->description }}</p>
                          <div class="d-md-flex mt-5 mb-5">
                              <ul class="list">
                                  <li><span>Max:</span> {{ $room->persons }} {{ __('messages.persons') }}</li>
                              </ul>
                              <ul class="list ml-md-5">
                                  @if ($room->view == false)
                                  <li><span>{{ __('messages.view') }}:</span> {{ __('messages.noseaview') }}</li>
                                  @else
                                  <li><span>{{ __('messages.view') }}:</span> {{ __('messages.seaview') }}</li>
                                  @endif
                                  <li><span>{{ __('messages.beds') }}:</span> {{ $room->bed }}</li>

    
                              </ul>


                          </div>
                </div>
            </div>
          </div>
        </div>


        <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
          <div class="container">
              <div class="row no-gutters">
                  <div class="col-lg-12">
                      <form id="myform" method="POST" action="{{ route('bookingsingle.make',$room->id) }}"  class="booking-form aside-stretch">
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
                                  <span>{{ __('messages.booknow') }}<small>{{ __('messages.bprice') }}</small></span>
                                </button>
                          </div>
                          </div>
                      </div>
         
              
              
                  </form>
                  </div>
              </div>
          </div>
      </section>
      </div>
    </div>
  </section> <!-- .section -->

@endsection