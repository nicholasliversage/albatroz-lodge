@extends('layout.app')

@section('content')
<style>
/* Menu Section */
#restaurant-menu h2 {
	
	color: #333;
	
	position: relative;
	margin-top: 10px;
	margin-bottom: 15px;
	padding-bottom: 20px;
}
#restaurant-menu h2::after {
	position: absolute;
	content: "";
	background: #007bff;
	height: 2px;
	width: 70px;
	bottom: 0;
	margin-left: -35px;
	left: 50%;
}
#menu {
	padding: 20px;
	transition: all 0.8s;
}
#menu.navbar-default {
	background-color: rgba(248, 248, 248, 0);
	border-color: rgba(231, 231, 231, 0);
}
#menu.navbar-default .navbar-nav > li > a {
	text-transform: uppercase;
	color: #eee;
	font-weight: 400;
	font-size: 15px;
	padding: 5px 0;
	border: 2px solid transparent;
	letter-spacing: 0.5px;
	margin: 0 40px 0 40px;
}
#menu.navbar-default .navbar-nav > li > a:hover {
	color: #d43031;
}
.section-title {
	margin-bottom: 70px;
}
.section-title .overlay {
	padding: 80px 0;
	background: rgba(0, 0, 0, 0.7);
}
.section-title p {
	font-size: 22px;
}
.section-title hr {
	margin: 0 auto;
	margin-bottom: 40px;
}
#restaurant-menu {
	padding: 100px 0 60px 0;
}
#restaurant-menu img {
	width: 300px;
	box-shadow: 15px 0 #a7c44c;
}
#restaurant-menu h3 {
	padding: 10px 0;
	text-transform: uppercase;
}
#restaurant-menu .menu-section hr {
	margin: 0 auto;
}
#restaurant-menu .menu-section {
	margin: 0 20px 80px;
}
#restaurant-menu .menu-section-title {
	font-size: 32px;
	display: block;
	font-weight: 400;
	color: #444;
	margin: 20px 0;
	text-align: center;
}
#restaurant-menu .menu-item {
	margin: 45px 0;
	font-size: 18px;
}
#restaurant-menu .menu-item-name {
	font-weight: 400;
	font-size: 20px;
	color: #444;
	margin-bottom: 10px;
}
#restaurant-menu .menu-item-description {
	font-size: 15px;
	width: 85%;
}
#restaurant-menu .menu-item-price {
	float: right;
	font-weight: 400;
	color: #007bff;
	margin-top: -36px;
}
</style>

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

      <!-- Restaurant Menu Section -->
<div id="restaurant-menu">
  <div class="container">
    <div class="section-title text-center">
      <h2>Menu</h2>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Breakfast & Starters</h2>
          <div class="menu-item">
            <div class="menu-item-name">Tortellini Skewers</div>
            <div class="menu-item-price"> $9 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Fried Ravioli</div>
            <div class="menu-item-price"> $7 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Wild Mushroom Arancini</div>
            <div class="menu-item-price"> $9 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Mozzarella Sticks</div>
            <div class="menu-item-price"> $10 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Main Course</h2>
          <div class="menu-item">
            <div class="menu-item-name">Roast Stuffed Chicken</div>
            <div class="menu-item-price"> $18 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Chicken & Mushroom Pasta</div>
            <div class="menu-item-price"> $20 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Beef Lasagne</div>
            <div class="menu-item-price"> $14 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Chicken Goujons</div>
            <div class="menu-item-price"> $19 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Dinner</h2>
          <div class="menu-item">
            <div class="menu-item-name">Sesame-Ginger Beef</div>
            <div class="menu-item-price"> $15 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Crispy Fried Chicken</div>
            <div class="menu-item-price"> $17 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Mongolian Shrimp & Broccoli</div>
            <div class="menu-item-price"> $18 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Spicy Coconut Salmon</div>
            <div class="menu-item-price"> $20 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Desserts</h2>
          <div class="menu-item">
            <div class="menu-item-name">Chocolate Mud Cake</div>
            <div class="menu-item-price"> $11 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Bourbon-Pecan Tart</div>
            <div class="menu-item-price"> $14 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Texas Sheet Cake</div>
            <div class="menu-item-price"> $15 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Vanilla Cheesecake</div>
            <div class="menu-item-price"> $18 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


