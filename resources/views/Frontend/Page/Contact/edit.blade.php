@extends('Frontend.app')
@section('ram')
<div class="container">
    <form method="POST" action="{{route('contact.update',$contact->id)}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">name</label>
          <input type="text" name="full_name" value="{{$contact->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contact</label>
          <input type="text" name="contact" value="{{$contact->contact}}" class="form-control" id="exampleInputtext1">
        </div>
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Address</label>
            <input type="text" name="address" value="{{$contact->address}}" class="form-control" id="exampleInputtext1">
          </div>
          <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Phone number</label>
            <input type="text" name="phone_number" value="{{$contact->phone_number}}" class="form-control" id="exampleInputPassword1">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
