@extends('Frontend.app')
@section('ram')
<table class="table">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Full name</th>
        <th scope="col">contact</th>
        <th scope="col">address</th>
        <th scope="col">phone number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($contact as $contacts )
            <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$contacts->name}}</td>
        <td>{{$contacts->contact}}</td>
        <td>{{$contacts->address}}</td>
        <td>{{$contacts->phone_number}}</td>
        <td>
            <a href="{{route('contact.edit',$contacts->id)}}" class="badge bg-success">Edit</a>
            <a href="{{route('contact.delete',$contacts->id)}}" class="badge bg-danger">Delete</a>

        </td>
      </tr>
        @endforeach
      
      
    </tbody>
  </table>
    
@endsection