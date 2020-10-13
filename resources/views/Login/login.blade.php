@extends('layouts.master')
@section('title','Lubaba-Interior Login')
@section('content')

    <body class="body login">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1 class="text-center">Lubaba Interior</h1>
                    <img src="/images/51.jpg" alt="">
                    <form action="{{ action('/login') }}" method="post">
                        @csrf
                        <input type="email" class="form-control" name="email" placeholder="Enter your E-mail address">
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                        <button class="btn btn-info" type="submit">Log In</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>

@endsection