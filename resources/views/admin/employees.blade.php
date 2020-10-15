@extends('layouts.admin-master')
@section('title','Create New Employee')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mt-md-3 pt-md-5 mb-5">
                        <div class="col-xl-12 col-sm-12 p-22 mb-3">
                            <!--Add Modal -->
                            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Eemployee</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('Admin\EmployeeController@store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="modal-body">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">First Name:</label>
                                                        <input type="text" name="first_name" placeholder="Enter First Name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Last Name :</label>
                                                        <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Mobile No :</label>
                                                        <input type="text" name="contact" placeholder="Enter Mobile No" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Enter CNIC :</label>
                                                        <input type="text" name="cnic" placeholder="Enter Cnic No" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Address :</label>
                                                        <input type="text" name="address" placeholder="Enter Address" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Select Employee Image :</label>
                                                    <div class="custom-file mt-1 mb-3">
                                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Button trigger modal -->
                            <!-- Edit Modal -->
                            <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Employee Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/employees" method="post" id="editForm">
                                    @csrf
                                    @method('PUT')
                                        <div class="modal-body">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">First Name:</label>
                                                        <input type="text" name="first_name" id="first_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Last Name :</label>
                                                        <input type="text" name="last_name" id="last_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Mobile No :</label>
                                                        <input type="text" name="contact" id="contact" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Enter CNIC :</label>
                                                        <input type="text" name="cnic" id="cnic" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Address :</label>
                                                        <input type="text" name="address" id="image"  class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Button trigger modal -->
                            <!-- delete data from Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Employee Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/employees" method="post" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                        <div class="modal-body">
                                            <p>Are you sure to delete the data?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes! Delete Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="d-flex">
                                    <h1 class="w-100">Add New Employee Record</h1>
                                    <button type="button" class="btn btn-success mt-3 mb-3 ml-5 w-25" data-toggle="modal" data-target="#exampleModal">
                                        Add New Employee
                                    </button>
                                </div>
                                @if(count($errors)>0)
                                <div class="alert-danger alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if(\Session:: has('success'))
                                    <div class="alert-success alert">
                                        <p>{{\Session::get('success')}}</p>
                                    </div>
                                @endif
                                <table id="datatable" class="table table-striped table-dark mt-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Cnic</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $emp)
                                            <tr>
                                                <td>{{ $emp->id }}</td>
                                                <td>{{ $emp->first_name }} {{ $emp->last_name }}</td>
                                                <td>{{ $emp->contact }}</td>
                                                <td>{{ $emp->cnic }}</td>
                                                <td>{{ $emp->address }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-success edit">Edit</a>
                                                    <a href="#" class="btn btn-danger delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function (){
            var table=$('#datatable').DataTable();
            //start edit record
            table.on('click','.edit',function(){
                $tr=$(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr=$tr.prev('.parent');
                }
                var data=table.row($tr).data();
                console.log(data);
                $('#first_name').val(data[1]);
                $('#last_name').val(data[2]);
                $('#contact').val(data[3]);
                $('#cnic').val(data[4]);
                $('#image').val(data[5]);

                $('#editForm').attr('action','/admin/employees/'+data[0]);
                $('#editModal').modal('show');
            });
            //end edit record

            //start delete record
            table.on('click','.delete',function(){
                $tr=$(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr=$tr.prev('.parent');
                }
                var data=table.row($tr).data();
                console.log(data);

                $('#deleteForm').attr('action','/admin/employees/'+data[0]);
                $('#deleteModal').modal('show');
            });
            //end delete record
        });
    // </script>
@endsection
