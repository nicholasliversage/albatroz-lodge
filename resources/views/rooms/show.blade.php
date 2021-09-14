@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('/images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="/rooms">Rooms</a></span> <span>Rooms Single</span></p>
              <h1 class="mb-4 bread">Rooms Details</h1>
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
                    <h2 class="mb-4">{{ $room->name }} <span> - ({{ $room->rooms }} Available rooms)</span></h2>
                          <p>{{ $room->description }}</p>
                          <div class="d-md-flex mt-5 mb-5">
                              <ul class="list">
                                  <li><span>Max:</span> {{ $room->persons }} Persons</li>
                              </ul>
                              <ul class="list ml-md-5">
                                  @if ($room->view == false)
                                  <li><span>View:</span> No Sea View</li>
                                  @else
                                  <li><span>View:</span> Sea View</li>
                                  @endif
                                  <li><span>Beds:</span> {{ $room->bed }}</li>
                              </ul>
                          </div>
                </div>
            </div>
          </div>

          

         
        </div>
      </div>
    </div>
  </section> <!-- .section -->

@endsection