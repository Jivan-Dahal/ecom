@extends('Frontend.app')
@section('ram')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Full name</th>
                <th scope="col">contact</th>
                <th scope="col">address</th>
              
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($staff as $staffs)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $staffs->name }}</td>
                    <td>{{ $staffs->contact }}</td>
                    <td>{{ $staffs->address }}</td>
                    <td class="d-flex">
                        <a href="{{route('staff.edit',$staffs->id)}}" class="badge bg-success">Edit</a>
                        <form action="{{route('staff.destroy',$staffs->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button> Delete</button>  

                        </form>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
