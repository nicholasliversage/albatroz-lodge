@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')
<div id="page-wrapper">

    <div >
        <h2 style="text-align:center;">Menu</h2>
        <button type="button" class="btn btn-success">Add New Dish</button>
      </div>
      <br>

          @foreach ($dishes as $dish)
              
         @if ($dish->special)
         <div class="card" style="width:400px">
            <img style="width:398px;height:280px; margin-bottom:10px;" class="card-img-top" src="/{{ $dish->imgDish }}" alt="Card image">
           
            <div class="card-body" style="margin-left:10px;">
              <h4 class="card-title">{{ $dish->name }}</h4>
              <p class="card-text">{{ $dish->description }}</p>
             <p> <span>${{ $dish->price }}.00</span><p>
              <a href="#" class="btn btn-primary">Edit</a>
              <a class="btn btn-danger" href="#" >Delete</a>
            </div>
          </div>
    @endif
    @endforeach



@endsection