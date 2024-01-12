@extends('Frontend.app')
@section('ram')
<div class="col-12">
    <div class="">

        <a href=""><button class="btn btn-danger">Remove All</button></a>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->food->name }}
                            </td>
                            <td>
                                <img src="{{asset($c->food->image)}}" height="45px" width="45px" alt="">
                            </td>
                            <td>Rs. {{$c->food->price}}</td>
                            <td>
                                {{ $c->quantity }}
                            </td>
                            <td>
                                {{ $c->total_amount }}
                            </td>
                            <td>
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
