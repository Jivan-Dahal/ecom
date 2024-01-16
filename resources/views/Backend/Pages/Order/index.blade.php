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
                            {{-- <th>Image</th> --}}
                            <th>Food</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $o )
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $o->fullname }}</td>
                        <td>{{ $o->email }}</td>
                        <td>{{ $o->address }}</td>
                        <td>{{ $o->number }}</td>
                        {{-- <td>No Image</td> --}}

                        {{-- <td>
                            <img src="{{ asset($o->food ->image) }}" height="45px" width="45px" alt="">

                        </td> --}}
                        <td>{{ $o->food }}</td>
                        <td>{{ $o->total_price }}</td>
                        <td style="
    @switch($o->order_status)
        @case('pending')
            color: red;
            @break

        @case('processed')
            color: blue;
            @break

        @case('shipped')
            color: green;
            @break

        @case('delivered')
            color: orange;
            @break
    @endswitch
">
    @if ($o->order_status == 'pending')
        Pending
    @elseif ($o->order_status == 'processed')
        Processed
    @elseif ($o->order_status == 'shipped')
        Shipped
    @elseif ($o->order_status == 'delivered')
        Delivered
    @else
        <!-- Your content goes here for other cases -->
    @endif
</td>


                        <td>123</td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
