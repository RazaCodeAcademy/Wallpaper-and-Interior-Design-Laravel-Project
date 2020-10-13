@extends('layouts.admin-master')
@section('title','Create New Category')
@section('content')

    <!-- start Code Here -->
    <section>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mt-md-3 pt-md-5 mb-5">
                        <div class="col-xl-12 col-sm-12 p-22 mb-3">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Categ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('Admin\CategoryController@store') }}" method="post">
                                    @csrf
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Enter Category Name:</label>
                                                    <input type="text" name="title" placeholder="Enter Category Name" class="form-control">
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
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/ategories" method="post" id="editForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Enter Category Name:</label>
                                                    <input type="text" name="title" id="title" class="form-control">
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

                            <!-- delete data from Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Category Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/categories" method="post" id="deleteForm">
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
                            <!-- End delete modal -->

                            <div class="d-flex">
                                <h1 class="w-100">Add New Categories</h1>
                                <button type="button" class="btn btn-success mt-3 mb-3 ml-5 ml-auto w-25" data-toggle="modal" data-target="#exampleModal">
                                    Add New Category
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
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->category_title }}</td>
                                            <td>{{ $category->created_at }}</td>
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
    </section>
    <!-- end Code Here -->

    {{-- javascript code goes here --}}
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
                $('#title').val(data[1]);

                $('#editForm').attr('action','/admin/categories/'+data[0]);
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

                $('#deleteForm').attr('action','/admin/categories/'+data[0]);
                $('#deleteModal').modal('show');
            });
            //end delete record
        });
    </script>

    {{-- javascript code end here --}}

@endsection
