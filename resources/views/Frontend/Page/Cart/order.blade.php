@extends('Frontend.app')

@section('style')
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('ram')
    <div class="col-md-12">

        <div class="card card-primary">
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="slug" class="form-control" id="exampleInputEmail1"
                                    placeholder="Slug">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="food_name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Food Name">
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input type="double" class="form-control" name="price" id="">
                            </div>


                        </div>
                        


                    </div>

                </div>

                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea class="h-75" id="summernote" name="description">

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
        $(function() {
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
