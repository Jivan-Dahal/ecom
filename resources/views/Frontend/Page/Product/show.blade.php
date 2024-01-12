
@extends('Frontend.app')

@section('ram')
@include('Frontend.components.alert')
<div class="col-md-12" style="margin: 30px">
    <form action="{{ route('cart') }}" method="post">
        @csrf

    <div class="row">
        <div class="col-6" >

            <img src="{{asset($food->image)}}" height="600px" width="700px" alt="">

        </div>

        <div class="col-md-6">

            <div>
                <span>Name:</span>
                <span>{{$food->name}}</span>


            </div>
            <div>
                <span>category:</span>
                <span>{{$food->category->category}}</span>


            </div>
            <div>
                <span>Price:</span>
                <span>{{$food->price}}</span>


            </div>
            <div>
                <span>Description:</span>
                <span>{{$food->description}}</span>


            </div>
                    <input type="number" min="1" class="form-control w-25" name="quantity" id="">
            <div>

            </div>
            <div>
                @if(Auth::user())
                <a href="{{ route('cart') }}"><button class="btn btn-primary">Add to Cart</button></a>
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="">
                @else
                <a href=" {{ route('login') }}"><button class="btn btn-primary">Add to Cart</button></a>


                @endif




            </div>
            {{-- @auth
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="">
        @endauth --}}


            <input type="hidden" value="{{ $food->id }}" name="food_id" id="">

        </div>

    </div>
</form>


</div>

@endsection
