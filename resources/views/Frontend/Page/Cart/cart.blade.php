@extends('Frontend.app')
@section('ram')
    <div class="row">
        <div class="col-md-6 ">
            <div class="d-flex justify-content-end">

                <a href="{{ route('cart.deleteAll',Auth::user()->id) }}"><button class="btn btn-danger">Remove All</button></a>
            </div>
            <div class="box">
                <!-- /.card-header -->
                <div class="box">
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
                                        <img src="{{ asset($c->food->image) }}" height="45px" width="45px" alt="">
                                    </td>
                                    <td>Rs. {{ $c->food->price }}</td>
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
                                        <a href="{{ route('cart.delete',$c->id) }}"><button class="badge bg-danger">Delete</button></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: right" colspan="5">Grand Total </th>
                                <td>{{ $grandTotal }}</td>

                                {{-- <td>
                                <a href="{{ route('order', $c->user_id) }}"><button class="badge bg-success">Order
                                        Now</button></a>
                            </td> --}}
                            </tr>
                        </tfoot>
                        </tfoot>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">CheckOut</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('order') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Name</label>
                                    <input type="text" name="fullname" value="{{Auth::user()->name }}" class="form-control" id="exampleInputEmail1"
                                        placeholder="Username">

                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Email" readonly>
                                </div>

                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact No</label>
                                    <input type="text" name="number" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter phone no">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Address">
                                        <input type="hidden" name="total_price" value="{{ $grandTotal }}" class="form-control" id="exampleInputEmail1">
                                </div>

                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    @foreach ($cart as $c)
                                    <input type="hidden" name="food_name" value="{{ $c->food->name }} ({{ $c->quantity }})" class="form-control" id="exampleInputEmail1">
                                    <input type="hidden" name="food_id[]" value="{{$c->food ->id }}" class="form-control" id="exampleInputEmail1">
                                    @endforeach

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1">

                                </div>
                                <input type="text" name="order_id" value="{{ $orderId }}" class="form-control" id="exampleInputEmail1">


                            </div> --}}
                            <div class="d-flex justify-content-center">
                                <div class="form-group">
                                    <button type="submit"  class="badge bg-success">Order</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
