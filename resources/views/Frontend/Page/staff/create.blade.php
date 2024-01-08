@extends('Frontend.app')
@section('ram')
<div class="container">
    <form method="POST" action="">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">name</label>
          <input type="text" name="full_name" value="{{old('full_name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('full_name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contact</label>
          <input type="text" name="contact" value="{{old('contact')}}" class="form-control" id="exampleInputtext1">
          @error('contact')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Address</label>
            <input type="text" name="address" value="{{old('address')}}" class="form-control" id="exampleInputtext1">
            @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
