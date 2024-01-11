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

            {{-- @foreach ($carousel as $c)
                @if ($c->status == 1)
                    <div class="carousel-item active">
                        <img src="{{ asset($c->image) }}" height="500px" class="d-block w-100" alt="...">
                    </div>
                @endif
            @endforeach --}}
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
