@extends('Frontend.App')
{{-- ['carts' => $cart] --}}
@section('ram')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $allZero = true;
            @endphp

            @foreach ($carousel as $c)
                @if ($c->status == 1)
                    <div class="carousel-item active">
                        <img src="{{ asset($c->image) }}" height="500px" class="d-block w-100" alt="...">
                    </div>
                    @php
                        $allZero = false;
                    @endphp
                @endif
            @endforeach

            @if ($allZero)
                <div class="carousel-item active">
                    <img src="{{ asset('image/no-data.jpg') }}" height="400px" class="d-block w-100" alt="Default Image">

                </div>
            @endif


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

    <section>

        <div class="container">
            <span><b>New Foods </b></span>
            <div class="row">
                @foreach ($foods as $f)
                    <div class="col-md-3">
                        <div class="card" style="width: full">

                            <div class="card-body ">
                                <img src="{{ asset($f->image) }}" height="100px" class="card-img-top" alt="...">
                                <div class="my-2 text-center ">
                                    {{ $f->name }}

                                </div>
                                <div class="my-2 text-center ">
                                    Rs.{{ $f->price }}

                                </div>
                                <div class="d-flex justify-content-center">
                                  <a href="{{route('product.show',$f->slug)}}"> <button class="btn btn-primary ">View</button> </a>


                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach



            </div>



        </div>
    </section>
@endsection
