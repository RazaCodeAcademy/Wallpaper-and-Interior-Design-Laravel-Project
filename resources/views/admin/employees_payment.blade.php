@extends('layouts.admin-master')
@section('title','Employee Payement Detail')
@section('content')
    <!-- start Code Here -->
    <section>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mt-md-3 pt-md-5 mb-5">
                        <div class="col-xl-12 col-sm-12 p-22 mb-3">
                            <!--Add Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Employee Payment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('Admin\PaymentController@store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Employee: </label>
                                                        <select class="browser-default custom-select" name="employee_id">
                                                            <option>Select Employee</option>
                                                            @foreach($employees as $employee)
                                                                <option value="{{$employee->id}}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Project: </label>
                                                        <select class="browser-default custom-select" name="project_id">
                                                            <option>Select Project</option>
                                                            @foreach($projects as $project)
                                                                <option value="{{$project->id}}">{{ $project->project_title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Enter Employee Payment:</label>
                                                        <input type="text" name="payment" placeholder="Enter Employee Payment" class="form-control">
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
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Employee Payment Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/payments/" method="post" id="editForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Employee: </label>
                                                    <select class="browser-default custom-select" name="employee_id">
                                                        <option>Select Employee</option>
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Project: </label>
                                                    <select class="browser-default custom-select" name="project_id">
                                                        <option>Select Project</option>
                                                        @foreach($projects as $projects)
                                                            <option value="{{$projects->id}}">{{ $projects->project_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Enter Employee Payment:</label>
                                                    <input type="text" name="payment" id="payment" placeholder="Enter Employee Payment" class="form-control">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Employee Payment Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/payments/" method="post" id="deleteForm">
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
                                    <h1 class="w-100">Add Employee Payment</h1>
                                    <button type="button" class="btn btn-success mt-3 mb-3 ml-auto w-25" data-toggle="modal" data-target="#exampleModal">
                                        Add Payment
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
                                            <th>Payment ID</th>
                                            <th>Employee Name</th>
                                            <th>Project Name</th>
                                            <th>Payment</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ $payment->first_name }} {{ $payment->last_name }}</td>
                                                <td>{{ $payment->project_title }}</td>
                                                <td>{{ $payment->payment }}</td>
                                                <td>{{ $payment->created_at }}</td>
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
                $('#payment').val(data[3]);

                $('#editForm').attr('action','/admin/payments/'+data[0]);
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

                $('#deleteForm').attr('action','/admin/payments/'+data[0]);
                $('#deleteModal').modal('show');
            });
            //end delete record
        });
    </script>
@endsection
