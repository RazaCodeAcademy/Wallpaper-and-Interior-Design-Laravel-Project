@extends('layouts.admin-master')
@section('title','Admin-Home')
@section('content')
<!-- start cards -->
<section>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row mt-md-3 pt-md-5 mb-5">
                    <div class="col-xl-4 col-sm-6 p-2 mb-3">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-plus-square fa-3x text-warning" aria-hidden="true"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Posts</h5>
                                        <h3>{{ $posts ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <a href="/admin/posts" class="text-secondary">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 p-2 mb-3">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-users fa-3x text-success" aria-hidden="true"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Employees</h5>
                                        <h3>{{ $employees ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <a href="/admin/employees" class="text-secondary">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 p-2 mb-3">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-project-diagram fa-3x text-info" aria-hidden="true"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Projects</h5>
                                        <h3>{{ $projects ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <a href="/admin/projects" class="text-secondary">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 p-2 mb-md-3">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-users fa-3x text-primary" aria-hidden="true"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Clients</h5>
                                        <h3>{{ $clients ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <a href="/admin/clients" class="text-secondary">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 p-2 mb-md-3">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-bell fa-3x text-secondary" aria-hidden="true"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Notifications</h5>
                                        <h3>{{ $notifications ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <a href="/admin/notifications" class="text-secondary">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 p-2 mb-md-3">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fa fa-list-alt fa-3x text-dark" aria-hidden="true"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Categories</h5>
                                        <h3>{{ $categories ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <a href="/admin/categories" class="text-secondary">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end card -->

<!-- start Code Here -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row mb-5">
                    <div class="col-xl-12 col-sm-12 py-2 mb-3">
                        <h4 class="text-muted mb-4">Recent Customer Activities</h4>
                        <div id="accordion">
                            @foreach($messages as $message)
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="{{ '#abc'.$loop->iteration }}">
                                            <img src="/images/my-image.jpeg" alt="" width="50" class="mr-3 rounded">
                                            {{ $message->name }} Posted a new comment at {{ $message->created_at }}
                                        </button>
                                    </div>
                                    @if ($loop->first)
                                        <div class="collapse show" id="{{ 'abc'.$loop->iteration }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <b>Email : </b><span>{{ $message->email }}</span><br>
                                                <b>Phone : </b><span>{{ $message->phone }}</span><br>
                                                <b>Subject : </b><span>{{ $message->subject }}</span><br>
                                                <b>Message : </b><span>{{ $message->messages }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="collapse" id="{{ 'abc'.$loop->iteration }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <b>Email : </b><span>{{ $message->email }}</span><br>
                                                <b>Phone : </b><span>{{ $message->phone }}</strong><br>
                                                <b>Subject : </b><span>{{ $message->subject }}</span><br>
                                                <b>Message : </b><span>{{ $message->messages }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Activies here -->
@endsection
