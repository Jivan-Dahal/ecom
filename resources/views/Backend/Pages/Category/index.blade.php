@extends('Backend.app')
@section('content')
    <div class="col-12">
        <div class="">

            <a href="{{ route('category.create') }}"><button class="btn btn-primary">Add Category</button></a>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Category</th>
                            <th>image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->category }}
                                </td>
                                <td>
                                    <img src="{{asset($c->image)}}" height="45px" width="45px" alt="">
                                </td>
                                <td>
                                    <a href="{{route('category.edit',$c->id)}}" class="badge bg-success">Edit</a>
                                    <a href="" class="badge bg-danger">delete</a>

                                </td>

                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
