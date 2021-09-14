@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')

<div id="page-wrapper">
    <div >
        <h2 style="text-align:center;">Chalets</h2>
        <button type="button" class="btn btn-success">Add New Chalet</button>
      </div>
      <br>
      @foreach ($rooms as $room)
              
     
      <div class="card" style="width:400px">
         <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $room->imgRoom }}" alt="Card image">
        
         <div class="card-body" style="margin-left:10px;">
           <h4 class="card-title">{{ $room->name }}<span> - ({{ $room->rooms }} Available rooms)</span></h4>
           <p class="card-text">{{ $room->description }}</p>
           <div class="d-md-flex mt-5 mb-5">
            <ul class="list">
            </ul>
            <ul class="list ml-md-5">
                <li><span>Max:</span> {{ $room->persons }} Persons</li>

                @if ($room->view == false)
                <li><span>View:</span> No Sea View</li>
                @else
                <li><span>View:</span> Sea View</li>
                @endif
                <li><span>Beds:</span> {{ $room->bed }}</li>
            </ul>
        </div>
          <p> <span>${{ $room->price }}.00 per night</span><p>
           <a href="#" class="btn btn-primary">Edit</a>
           <a class="btn btn-danger" href="#" >Delete</a>
         </div>
       </div>

 @endforeach
</div>


@endsection