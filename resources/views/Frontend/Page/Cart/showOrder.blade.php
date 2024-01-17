@extends('Frontend.app')

@section('style')
    <link rel="stylesheet" href='/dist/css/default.css'>
@endsection

@section('ram')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="d-flex justify-content-center">
                    <h2 class="myorder">My Order</h2>
                </div>
                <div class="box">
                    <!-- /.card-header -->
                    <div class="box">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Customer Name</th>
                                    <th>Phone number</th>
                                    <th>Address</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Order date</th>
                                    <th>View Foods</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($orders as $o)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $o->fullname }}</td>
                                        <td>{{ $o->number }}</td>
                                        <td>{{ $o->address }}</td>
                                        <td>{{ $o->total_price }}</td>
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
                                        <td>{{ $o->created_at }}</td>
                                        <td><!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $loop->iteration }}">
                                                Foods
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
                                                                                    <img src="{{ asset($f->image) }}"
                                                                                        height="50px" width="50px"
                                                                                        alt="">
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
