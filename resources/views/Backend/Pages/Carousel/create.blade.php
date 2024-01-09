@extends('Backend.app')
@section('breadcrums')
><li class="breadcrumb-item active"><a href="{{route('carousel')}}">Carousel List</a></li>
<li class="breadcrumb-item active">Add Carousel</li>


@endsection
@section('content')
<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">New Food</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('carousel.store')}}" enctype="multipart/form-data">
            @csrf

          <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                      </div>

                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file"  class="form-control" name="image" id="">
                          </div>


                    </div>

                </div>

            </div>



          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>

@endsection
