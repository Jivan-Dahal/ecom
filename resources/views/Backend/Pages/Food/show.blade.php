
@extends('Backend.app')

@section('content')
<div class="col-md-12">

    <div class="row">
        <div class="col-4">

            <img src="{{asset($food->image)}}" height="400px" width="350px" alt="">

        </div>

        <div class="col-md-8">

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
                <span>{!!$food->description!!}</span>


            </div>


        </div>

    </div>


</div>

@endsection
