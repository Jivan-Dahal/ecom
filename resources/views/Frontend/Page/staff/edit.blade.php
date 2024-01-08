@extends('Frontend.app')
@section('ram')
<div class="container">
    <form method="POST" action="{{route('staff.update',$staff->id)}}">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">name</label>
          <input type="text" name="full_name" value="{{$staff->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('full_name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contact</label>
          <input type="text" name="contact" value="{{$staff->contact}}" class="form-control" id="exampleInputtext1">
          @error('contact')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Address</label>
            <input type="text" name="address" value="{{$staff->address}}" class="form-control" id="exampleInputtext1">
            @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
