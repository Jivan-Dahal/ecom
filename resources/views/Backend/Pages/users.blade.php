@extends('Backend.app')
@section('content')
<div class="col-12">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with minimal features & hover style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>S.N</th>
              <th>User</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
             
            </tr>
            </thead>
            <tbody>
              @foreach ($user as $u )
              <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$u->name}}
            </td>
            <td>{{$u->email}}</td>
            <td>

              @if($u->is_role == 0)
              <span class="badge bg-danger">user</span>
              @else
              <span class="badge bg-success">Admin</span>
              @endif

            </td>
            <td>
              @if($u->is_role == 0)
              <a href="{{route('make.admin',$u->id)}}"><button class=" badge bg-primary">make Admin</button></a>
              @else

              <a href="{{route('make.user',$u->id)}}"><button class=" badge bg-danger">make user</button></a>
              @endif

            </td>
          </tr>

                  
              @endforeach
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
</div>
@endsection