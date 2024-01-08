@extends('Backend.app')
@section('content')
<div class="col-md-12">

    <div >

        <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Category</label>
            <input type="text" name="category" value="{{$category->category}}" class="form-control w-25" name="" id="">
            <label for="">Upload</label>
            <input type="file"  name="image"value="{{asset($category->image)}}" class="form-control w-25" name="" id="">
            <div class="my-2">

                <button class="btn btn-primary" type="submit">submit</button>
            </div>
        </form>
    </div>


</div>

@endsection
