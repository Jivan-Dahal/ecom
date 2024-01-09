@extends('Backend.app')
@section('breadcrums')
><li class="breadcrumb-item active"><a href="{{route('food')}}">Food List</a></li>
<li class="breadcrumb-item active">Add food</li>


@endsection
@section('style')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

@endsection
@section('content')
<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">New Food</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('food.create')}}" enctype="multipart/form-data">
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
                        <label for="exampleInputEmail1">Food Name</label>
                        <input type="text" name="food_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Food Name">
                      </div>

                </div>
                <div class="col-md-6">

                    <div class="form-group">
                      <label for="">Category</label>
                      <select class="form-control" name="category_id" id="">
                        <option disabled selected>Select category</option>
                        @foreach ($category as $c )
                        <option value="{{$c->id}}" name="category_name">{{$c->category}}</option>

                        @endforeach

                      </select>
                    </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="double"  class="form-control" name="price" id="">
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

            <div class="col-md-12">
                <label for="">Description</label>
                <textarea class="h-75" id="summernote">

                  </textarea>


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

@section('script')
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>



@endsection
