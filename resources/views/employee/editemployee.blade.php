@extends('layouts.main')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Employee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
    @include('layouts.session')


    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 offset-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('users.update', $user->id) }}" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{$user->name}}" required> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter Email" required>
                  </div>
               

                  <div class="form-group">

                  @if($user->image != null)
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('/storage/'.$user->image)}}" alt="User profile picture">
                  @endif
                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Choose Image">
                  </div>

                  <div class="form-group" data-select2-id="46">
                  <label>Designation</label> 
                    <select class="form-control select2 select2-hidden-accessible" name="designation" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                    <option value=""> Choose Designation </option>
                    @foreach($designations as $designation)
                    <option value="{{$designation->id}}" @if ($designation->id == $user->designation_id) selected="selected"@endif> {{$designation->name}} </option>
                    @endforeach
                  </select>

                    
                  </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->   
       
      </div>
    </div>
  </div>
</div>

@section('script') 
@endsection     
@endsection