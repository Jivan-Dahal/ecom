@extends('Frontend.app')
@section('ram')

<div class="row">
    <div class="col-md-3 my-2">

        <div class="card">

            <div class="card-body shadow">

                <ul lass="text-decoration-none">

                    @foreach ( $category as $c )
                    <li c><a href=" {{route('product.category',$c->id)}}"> {{ $c->category }}</a></li>

                    @endforeach


                </ul>
            </div>
        </div>


    </div>

    <div class="col-md-9">
        <div class="row my-2">



            @foreach ($food as  $f)


            <div class="col-md-3 mx-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset($f->image)}}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">{{ $f->name }}</p>
                      <p class="card-text">Rs. {{ $f->price }}</p>
                      <a href="">View more</a>
                      <a href="{{route('product.show',$f->slug)}}"><button class="badge bg-success">View more..</button></a>



                    </div>
                </div>


            </div>
            @endforeach
        </div>

    </div>


</div>








@endsection
