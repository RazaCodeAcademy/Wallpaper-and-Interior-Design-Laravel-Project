@extends('layouts.admin-master')

@section('title','Notification Show Page')

@section('content')
    <!-- start Code Here -->
    <section>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mt-md-3 pt-md-5 mb-5">
                        <div class="col-xl-12 col-sm-12 p-22 mb-3">
                            <h4 class="text-muted mb-4">Recent Customer Activities</h4>
                            <div id="accordion">
                                @foreach($notifications as $notification)
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="{{ '#abc'.$loop->iteration }}">
                                                <img src="/images/my-image.jpeg" alt="" width="50" class="mr-3 rounded">
                                                {{ $notification->name }} Posted a new comment at {{ $notification->created_at }}
                                            </button>
                                        </div>
                                        @if ($loop->first)
                                            <div class="collapse show" id="{{ 'abc'.$loop->iteration }}" data-parent="#accordion">
                                                <div class="card-body">
                                                    <b>Email : </b><span>{{ $notification->email }}</span><br>
                                                    <b>Phone : </b><span>{{ $notification->phone }}</span><br>
                                                    <b>Subject : </b><span>{{ $notification->subject }}</span><br>
                                                    <b>Message : </b><span>{{ $notification->messages }}</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="collapse" id="{{ 'abc'.$loop->iteration }}" data-parent="#accordion">
                                                <div class="card-body">
                                                    <b>Email : </b><span>{{ $notification->email }}</span><br>
                                                    <b>Phone : </b><span>{{ $notification->phone }}</strong><br>
                                                    <b>Subject : </b><span>{{ $notification->subject }}</span><br>
                                                    <b>Message : </b><span>{{ $notification->messages }}</span>
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
