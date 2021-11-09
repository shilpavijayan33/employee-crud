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

                
            <!--  -->
            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form class="form" action="" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Record</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Email</label>
                                    <input type="text" name="email" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Designation</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="designation" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value=""> Choose Designation </option>
                                    @foreach($designations as $designation)
                                    <option value="{{$designation->id}}"> {{$designation->name}} </option>
                                    @endforeach
                                  </select>
                                </div>


                                <div class="form-group">
                                    <label for="dob">Image</label>
                                    <input type="file" name="image" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="modal-footer">
                              
                                <button type="submit" class="btn btn-primary btn-update">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--  -->


                
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
   

        // $.noConflict();
        var token = ''
        var modal = $('.modal')
        var form = $('.form')
        var btnUpdate = $('.btn-update');

            $(document).on('click','.btn-delete',function(){
             
                var rowid = $(this).data('rowid')
                var el = $(this)
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
                        url: "delete-user/"+rowid,
                        // data: {_token: CSRF_TOKEN,user:id},
                        dataType: 'JSON',
                        success: function (results) {                      
                            swal("Done!","User deleted successfully !!" , "success"); 
                            table.row(el.parents('tr'))
                              .remove()
                              .draw();                         
                        }
                    });

                } else {
                    e.dismiss;            
                    swal("Cancelled", "User is safe :)", "error");                            
                  }
                }, function (dismiss) {
                    return false;
                })
        })
      
      
       
        $(document).on('click','.btn-edit',function(){ 
            var rowData =  table.row($(this).parents('tr')).data()            
            form.find('input[name="id"]').val(rowData.id)
            form.find('input[name="name"]').val(rowData.name)
            form.find('input[name="email"]').val(rowData.email)
            form.find('input[name="designation"]').val(rowData.designation)
            modal.modal()
        })

        btnUpdate.click(function(){
            if(!confirm("Are you sure?")) return;
            var formData = form.serialize()+'&_method=PUT&_token='+token
            var updateId = form.find('input[name="id"]').val()
            $.ajax({
                type: "POST",
                url: "/" + updateId,
                data: formData,
                success: function (data) {
                    if (data.success) {
                        table.draw();
                        modal.modal('hide');
                    }
                }
             }); //end ajax
        })
            
      });
        

</script>
  
@endsection     
@endsection