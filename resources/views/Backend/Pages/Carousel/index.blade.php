@extends('Backend.app')
@section('breadcrums')
    <li class="breadcrumb-item active">Carousel List</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="">

            <a href="{{ route('carousel.create') }}"><button class="btn btn-primary">Add Food</button></a>
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
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($carousel as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($c->image) }}" height="45px" width="45px" alt="">
                                </td>
                                <td>
                                    @if ($c->status == 0)
                                        <a href="{{ route('show.carousel', $c->id) }}"><button class=" badge bg-primary">show carousel</button></a>
                                    @else
                                        <a href="{{ route('hide.carousel', $c->id) }}"><button class=" badge bg-danger">hide carousel</button></a>
                                    @endif

                                </td>
                                </td>
                                <td>
                                    <a href=""><button class="badge bg-primary">Edit</button></a>
                                    <a href=""><button class="badge bg-danger">Delete</button></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
