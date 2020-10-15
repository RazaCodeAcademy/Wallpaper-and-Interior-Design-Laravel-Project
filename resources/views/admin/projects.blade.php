@extends('layouts.admin-master')
@section('title','Add New Project')
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Projects</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('Admin\ProjectController@store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Enter Project Title:</label>
                                                        <input type="text" name="project_title" placeholder="Enter Project Title" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Wallpaper: </label>
                                                        <select class="browser-default custom-select" name="paper_id">
                                                            <option>Select Wallpaper</option>
                                                            @foreach($posts as $post)
                                                                <option value="{{$post->id}}">{{ $post->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Enter Total Role:</label>
                                                        <input type="text" name="total_role" placeholder="Enter Total Role" class="form-control">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Project Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/projects" method="post" id="editForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Enter Used Role:</label>
                                                    <input type="text" name="used_role" id="paper" placeholder="Enter Used Role" class="form-control">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Projects Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/projects" method="post" id="deleteForm">
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
                                    <h1 class="w-100">Add New Project</h1>
                                    <button type="button" class="btn btn-success mt-3 mb-3 ml-auto w-25" data-toggle="modal" data-target="#exampleModal">
                                        Add Project
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
                                            <th>Project Name</th>
                                            <th>Wallpaper</th>
                                            <th>Total Role</th>
                                            <th>Used Role</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                <td>{{ $project->project_title }}</td>
                                                <td>{{ $project->post->title }}</td>
                                                <td>{{ $project->total_role }}</td>
                                                <td>{{ $project->used_role }}</td>
                                                <td>{{ $project->created_at }}</td>
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
                $('#paper').val(data[4])

                $('#editForm').attr('action','/admin/projects/'+data[0]);
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

                $('#deleteForm').attr('action','/admin/projects/'+data[0]);
                $('#deleteModal').modal('show');
            });
            //end delete record
        });
    </script>
@endsection
