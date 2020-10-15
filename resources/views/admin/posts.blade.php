@extends('layouts.admin-master')
@section('title','Create New Items')
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('Admin\PostController@store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Enter Wallpaper Name:</label>
                                                        <input type="text" name="title" placeholder="Enter Wallpaper Name" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Enter Price of Wallpaper:</label>
                                                        <input type="text" name="price" placeholder="Enter Wallpaper Price" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Wallpaper Category: </label>
                                                        <select class="browser-default custom-select" name="category_id">
                                                            <option>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{ $category->category_title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="">Select Wallpaper Image :</label>
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
                            {{-- end modal --}}

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Item Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/posts" method="post" id="editForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Enter Wallpaper Name:</label>
                                                    <input type="text" name="title" id="title" placeholder="Enter Wallpaper Name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Enter Price of Wallpaper:</label>
                                                    <input type="text" name="price" id="price" placeholder="Enter Wallpaper Price" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Wallpaper Category: </label>
                                                    <select class="browser-default custom-select" name="category_id">
                                                        <option>Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{ $category->category_title }}</option>
                                                        @endforeach
                                                    </select>
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
                            <!-- Edit Modal End Here -->

                            <!-- delete data from Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Wallpaper Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/posts" method="post" id="deleteForm">
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
                            <div class="col-xl-12 d-flex">
                                <h1 class="w-100">Add New Wallpaper Item</h1>
                                <button type="button" class="btn btn-success mt-3 mb-3 ml-auto w-25" data-toggle="modal" data-target="#exampleModal">
                                    Add New Item
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
                            <table id="datatable" class="table table-striped table-dark mt-2 text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Dated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->price }}</td>
                                            <td>{{ $post->category_title }}</td>
                                            <td><img src="{{asset('uploads/images/'.$post->image)}}" alt="image" width="50" height="50"></td>
                                            <td>{{ $post->created_at }}</td>
                                            <td class="text-center">
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
                $('#price').val(data[2]);

                $('#editForm').attr('action','/admin/posts/'+data[0]);
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

                $('#deleteForm').attr('action','/admin/posts/'+data[0]);
                $('#deleteModal').modal('show');
            });
            //end delete record
        });
    </script>
    {{-- javascript code end here --}}
@endsection
