@extends('layouts.admin-master')
@section('title','Clients Information')
@section('content')
    <!-- start Code Here -->
    <section>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mt-md-3 pt-md-5 mb-5">
                        <div class="col-xl-12 col-sm-12 p-22 mb-3">
                            <div class="container-fluid">
                                <h1 class="text-center">Clients Information And Projects</h1>
                                <table id="datatable" class="table table-striped table-dark mt-2 text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Wallpaper</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->contact }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td>{{ $client->title }}</td>
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

                $('#editForm').attr('action','/Employees/'+data[0]);
                $('#editModal').modal('show');
            });
            //end edit record
        });
     </script>
@endsection
