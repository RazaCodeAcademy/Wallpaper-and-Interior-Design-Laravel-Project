@extends('layouts.master')
@section('title','Create New Employee')
@section('content')
    <div class="about-main-div">
        <div class="overlay">
            <div class="logo-text">
                <h1>
                    <button type="button" class="btn w-25 p-3 mt-3 mb-3 ml-5 border-white button-back" data-toggle="modal" data-target="#exampleModal">
                        <span class="span-style">BOOK WALLPAPER</span>
                    </button>
                </h1>
            </div>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Detail Please!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="{{ route('clients.store') }}" method="post">
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
                                <label for="">Enter Email :</label>
                                <input type="text" name="email" placeholder="Enter Email No" class="form-control">
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
                        <input type="hidden" name="paper_id" value="{{ $post->id }}">
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
<div class="bg-container">
    <h1  class="mt-3 text-center pl-3 pr-3">WELCOME TO LUBABA INTERIOR AND BOOK YOUR BEAUTIFUL CHOICE THANKS!</h1>
    <div class="container sub-container">
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
        <div class="row mt-5 mb-5 pt-3 pb-3">
            <div class="col-md-7">
                <img src="{{asset('uploads/images/'.$post->image)}}" alt=""class="post-image-size">
            </div>
            <div class="col-md-5 pl-3">
                <span>Created at : {{ $post->created_at }}</span>
                <h2 class="mt-3">{{ $post->title }}</h2>
                <span style="border-bottom:1px solid black; width:150px">______________________________</span><br><br>
                <h4 class="">Category</h4>
                <span class="mt-2">{{ $post->category->category_title ?? '' }}</span><br>
                <span style="border-bottom:1px solid black; width:150px">______________________________</span><br><br>
                <h4 class="">Price</h4>
                <span class="mt-2">{{ $post->price }}</span><br>
                <span style="border-bottom:1px solid black; width:150px">______________________________</span><br><br>
            </div>
        </div>
    </div>
</div>
@endsection