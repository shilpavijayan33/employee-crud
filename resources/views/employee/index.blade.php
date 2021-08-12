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
              <li class="breadcrumb-item active">Employee Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
    @include('layouts.session')

        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List All Employees</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                   

                    <div class="input-group-append">
                     
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table data-table">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>

                  
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
    </div>

    @section('script') 

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    
      $(document).ready(function(){
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('users.index') }}",

              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'designation', name: 'designation'},  
                  {data: 'view', name: 'view', orderable: false, searchable: false},
                  {data: 'edit', name: 'edit', orderable: false, searchable: false},
                  {data: 'delete', name: 'delete', orderable: false, searchable: false},

              ]
          });
          
        });

      
        function deleteUser(id){ 
        

            swal({
            title: "Change?",
            text: "Are you sure you want to delete this employee?",
            type: "success",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete the user!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

          if (e.value === true) {
            // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

              $.ajax({
                  type: 'GET',
                  url: "delete-user/"+id,
                  // data: {_token: CSRF_TOKEN,user:id},
                  dataType: 'JSON',
                  success: function (results) {

                
                          swal("Done!","User deleted successfully !!" , "success"); 
                          location.href = "/users";

                    
                  }
              });

          } else {
              e.dismiss;            
              swal("Cancelled", "User is safe :)", "error");
                      
          }

      }, function (dismiss) {
          return false;
      })

      }
</script>
  
    @endsection 

    
@endsection