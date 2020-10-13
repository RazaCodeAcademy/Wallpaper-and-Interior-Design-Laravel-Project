@extends('layouts.master')

@section('title','Contact Us Page')

@section('content')
    <div class="contact-main-div">
        <div class="overlay">
            <div class="logo-text"><h1>Contact Us</h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row w-100 mt-5">
            <div class="col-md-8 offset-2 text-center">
                <h1 style="font-size:35px; text-center">OUR MISSION</h1>
                <span style="border-bottom:1px solid black; width:150px">________________________________________</span><br><br>
                <p style="font-size:18px;" class="text-justify">Lubaba Interiors are interior designers, located in Gujrat.
                Our scope of work includes provides the provision state of the art carpets, rugs, artificial
                grass, curtains, wooden vinyl, Furniture and other different types of flooring etc. We cater
                general public as well as the corporate sector.</p>
            </div>
        </div>

        </div>
        <div class="row w-100 mb-5 mt-5">
            <div class="col-xl-6 col-lg-6 col-md-6 w-100" style="font-size:15px;">
                <div class="row mb-4">
                    <div class="col-md-8 offset-2">
                        <h2 class="border-bottom border-dark w-75 mb-4">CONTACT INFO:</h2>
                        <h6 class="mt-4">ADDRESS : <span>Service Morr, Gujrat-Pakistan</span></h6>
                        <h6 class="mt-4">EMAIL : <span>lubaba_interior@gmail.com</span></h6>
                        <h6 class="mt-4">CALL US : <span>0307-7050392, 0303-7900571</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 w-100">
                <form class="ml-5" action="{{ route('notifications.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your E-mail" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="Phone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea type="text" name="message" placeholder="Message" cols="30" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Send a message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 @endsection
