@extends('Backend.app')
@section('content')
    <div class="col-12">
        <div class="">

            <a href="{{ route('food.create') }}"><button class="btn btn-primary">Add Food</button></a>
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
                            <th>Name</th>
                            <th>image</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($food as $foods)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $foods->name }}
                                </td>
                                <td>
                                    <img src="{{asset($foods->image)}}" height="45px" width="45px" alt="">
                                </td>
                                <td>{{$foods->price}}</td>
                                <td>{{$foods->category->category}}</td>
                                <td>

                                    <a href="{{route('food.show',$foods->id)}}"><button class="badge bg-success">View</button></a>
                                    <a href=""><button class="badge bg-primary">Edit</button></a>
                                    <a href=""><button class="badge bg-danger">Delete</button></a>
                                </td>

                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
