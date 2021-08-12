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
              <li class="breadcrumb-item active">Create Employee</li>
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
                <h3 class="card-title">Create Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('users.store') }}" enctype='multipart/form-data'>
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
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
                    <option value="{{$designation->id}}"> {{$designation->name}} </option>
                    @endforeach
                  </select>

                    
                  </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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