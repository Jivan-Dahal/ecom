@extends('Frontend.App')

@section('ram')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        





        @foreach ($carousel as $c )
        @if ($c-> status==1)
        <div class="carousel-item active">
            <img src="{{asset($c->image)}}" height="500px" class="d-block w-100" alt="...">
          </div>

          @endif

        @endforeach





    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@endsection


