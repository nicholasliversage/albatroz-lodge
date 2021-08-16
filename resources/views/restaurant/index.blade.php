@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('images/header.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home</a></span> <span>Restaurant</span></p>
              <h1 class="mb-4 bread">Restaurant</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                <div class="single-slider-resto mb-4 mb-md-0 owl-carousel">
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/view-9.jpg);"></div>
                    </div>
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/room-5.jpg);"></div>
                    </div>
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/room-6.jpg);"></div>
                    </div>
                </div>
              </div>
              <div class="col-md-6 pl-md-5">
                  <div class="heading-section mb-4 my-5 my-md-0">
                <span class="subheading">About Albatroz Lodge</span>
              <h2 class="mb-4">Albatroz Restaurant</h2>
            </div>
            <p>Our exclusive restaurant and fully stocked bar offers mouth watering Mozambiquian cuisine.  Relax while enjoying a sundowner, looking out over Tofo Bay. </p>
            <p> Enjoy our new swimming pool with pool bar with its lovely sea view.  We serve cocktails, cold drinks, beer, wine and small meals at the pool bar.  Bring the kids and enjoy your day in this spectacular area!</p>
            <p><a href="#" class="btn btn-secondary rounded">More info</a></p>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-section ftco-menu bg-light">
          <div class="container">
              <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Albatroz Restaurant Menu</span>
          <h2>Our Specialties</h2>
        </div>
      </div>
              <div class="row">

                @foreach ($dishes as $dish)
                    
               
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
          @endforeach
      </div>
          
      </section>

@endsection