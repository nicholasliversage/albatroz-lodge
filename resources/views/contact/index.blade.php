@extends('layout.app')

@section('content')

<div class="hero-wrap" style="background-image: url('images/header.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact Us</span></p>
	            <h1 class="mb-4 bread">Contact Us</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info rounded bg-white p-4">
	            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info rounded bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info rounded bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:vergil99966@gmail.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info rounded bg-white p-4">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form id="myform" action="" method="post"  class="bg-white p-5 contact-form">
              <div class="form-group">
                <input id="mail-name" type="text" name="name" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input id="mail-email" type="text" name="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input id="mail-subject" type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea  id="mail-message" name="msg" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group"> 
                <button  id="mail" name="send_message_btn" type="button" value="Send Message" onclick="submitmyform();"  class="btn btn-secondary py-3 px-5">
                 <i style="display:none;" class="fa fa-refresh fa-spin" ></i><span id="send_btn">Send Message</span> 
                </button>
                
              </div>
            </form>
          
          </div>
          
<script type="text/javascript">
function load(msg) {      
      setTimeout( 
            function  (){  
               $('#send_btn').text('Send Message');
               $('#mail i').toggle();
                alert(msg);
                $('#myform').trigger('reset');
            }, 3000);    
}

function submitmyform(){
        $('#send_btn').text('Sending');
        $('#mail i').toggle();
        data=$('#myform').serialize();
        $.ajax({
        url: "send_script.php",
        type:'POST',
        data:data,
        async:false,
        dataType:'html',
        success: function(msg){
        load("Email sent!!");
        },
        error: function(msg){
         load("Failed to send!!");
        	
        }
    });

}

</script>


          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          	<script>
          	// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -23.841588, lng: 35.537138};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 7, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp8GIeKqAbGhOIc4-frPU2XRAxI0nqutI&callback=initMap">
    </script>
          	
          </div>
        </div>
      </div>
    </section>


@endsection