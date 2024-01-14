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
                @php
    $grandTotal = 0;
@endphp
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
                                @php
                                $grandTotal += $c->total_amount;
                            @endphp
                            </td>
                            <td>
                                <a href=""><button class="badge bg-danger">Delete</button></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align: right" colspan="5">Grand Total </th>
                        <td>{{ $grandTotal }}</td>

                        <td>
                            <a href="{{ route('order',$c->user_id) }}"><button class="badge bg-success">Order Now</button></a>
                        </td>
                      </tr>
                     </tfoot>
                </tfoot>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
