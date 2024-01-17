@extends('Backend.app')
@section('breadcrums')
    <li class="breadcrumb-item active">Order List</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Total Price</th>
                            <th>Food</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $o)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $o->fullname }}</td>
                                <td>{{ $o->user->email }}</td>
                                <td>{{ $o->address }}</td>
                                <td>{{ $o->number }}</td>
                                <td>{{ $o->total_price }}</td>
                                <td><!-- Button trigger modal -->
                                    <button type="button" class="badge bg-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $loop->iteration }}">
                                        View Food
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">All Foods</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="example2" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Image</th>
                                                                <th>Food</th>
                                                                <th>quantity</th>
                                                                <th>price</th>
                                                                <th>total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($items as $f)
                                                                @if ($o->id == $f->order_id)
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{ asset($f->image) }}" height="50px"
                                                                                width="50px" alt="">
                                                                        </td>
                                                                        <td>{{ $f->name }}</td>
                                                                        <td>{{ $f->quantity }}</td>
                                                                        <td>{{ $f->price }}</td>
                                                                        <td>{{ $f->price * $f->quantity }}</td>


                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save
                                                        changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    style="
                                @switch($o->order_status)
                                    @case('pending')
                                    color:gray;
                                        @break
                                    @case('processed')
                                    color:blue;
                                        @break
                                     @case('shipped')
                                    color:green;
                                        @break
                                    @case('delivered')
                                    color:purple;
                                        @break
                                     @case('returned')
                                    color:red;
                                        @break
                                    @case('paid')
                                    color:gold;
                                        @break
                                    @case('failed')
                                    color:red;
                                        @break
                                    @default
                                    color:black
                                @endswitch ">
                                    @if ($o->order_status == 'pending')
                                        Pending
                                    @elseif ($o->order_status == 'processed')
                                        Processed
                                    @elseif ($o->order_status == 'shipped')
                                        Shipped
                                    @elseif ($o->order_status == 'delivered')
                                        Delivered
                                    @elseif ($o->order_status == 'returned')
                                        Returned
                                    @elseif ($o->order_status == 'paid')
                                        Paid
                                    @elseif ($o->order_status == 'failed')
                                        Failed
                                    @endif

                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge bg-success" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $loop->iteration }}">
                                        Change
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop{{ $loop->iteration }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Change Order Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('order.update',$o->id) }}" method="post">
                                                        @csrf
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="">Order status</label>

                                                                <select class="form-control" name="order_status"
                                                                    id="{{ $loop->iteration }}">
                                                                    <option disabled selected>Select category</option>
                                                                    <option
                                                                        {{ $o->order_status == 'pending' ? 'selected' : '' }}
                                                                        value="pending">Pending</option>
                                                                    <option
                                                                        {{ $o->order_status == 'processed' ? 'selected' : '' }}
                                                                        value="processed">Processed</option>
                                                                    <option
                                                                        {{ $o->order_status == 'shipped' ? 'selected' : '' }}
                                                                        value="shipped">Shipped</option>
                                                                    <option
                                                                        {{ $o->order_status == 'delivered' ? 'selected' : '' }}
                                                                        value="delivered">Delivered</option>
                                                                    <option
                                                                        {{ $o->order_status == 'returned' ? 'selected' : '' }}
                                                                        value="returned">Returned</option>
                                                                    <option
                                                                        {{ $o->order_status == 'paid' ? 'selected' : '' }}
                                                                        value="paid">Paid</option>
                                                                    <option
                                                                        {{ $o->order_status == 'failed' ? 'selected' : '' }}
                                                                        value="failed">Failed</option>



                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
