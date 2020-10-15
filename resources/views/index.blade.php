@extends('layouts.master')

@section('title','Home-Lubaba Interior')

@section('content')
    <div class="main-div">
    <div class="overlay">
            <div class="logo-text"><h1>Lubaba Interior Design And Wallpaper</h1></div>
        </div>
    </div>
    <div class="pl-4 mt-4">
        <div class="row w-100">
            <div class="col-md-6 mt-5 text-justify" style="font-size:20px;">
                <strong>Lubaba Interiors</strong> is The Best <strong>Home Wallpapers Shop</strong> in Gujrat.
                With the right wallpaper for your space, walls convey comforting homeliness,
                eye-catching style, haptic sensations, or stylish inspirations.
                Here at <strong>Lubaba Interiors</strong>, we take pride to provide our customers
                everything they require for styling and decorating their walls according to your
                preferences and choice – from bright colors, satin shimmer, extravagant patterns,
                and elegantly structured wallpapers to trendy wall decorations in fresh, bold colors.
                Give your home a special ambiance – with bright colors, satin shimmer, extravagant patterns,
                and distinctive abstracts, we’ve got the right items fulfilling your dreams. With our exclusive
                collection of unique collections of imported wallpapers, you can order classic subtle or
                innovative wallpaper creations for all rooms.
            </div>
            <div class="col-md-6 mt-5 w-100">
                <img src="/images/wallpapers-2.jpg" class="w-100" alt="">
            </div>
        </div>
    </div>
    <div class="pl-4">
        <div class="row w-100">
            <div class="col-md-6 mt-5 w-100">
                <img src="/images/wallpapers-1.jpg" class="w-100" alt="">
            </div>
            <div class="col-md-6 mt-5 text-justify" style="font-size:20px;">
                <strong>Lubaba Interiors</strong> provide a best services to our clients.
                Furnish your homes with <strong>Unique Home Wallpaper</strong> Designs. Buy Wallpapers
                for Homes Bedroom. We have a wide variety of brick and abstract
                wallpapers which includes many exquisite styles in term of color
                schemes and designs. This brings your home a unique character and
                distinctive accents. With our Wallpapers, we add a flair of ambiances
                to fill your space. It is our recommendation that you should enhance the
                whole room with this dramatic look of our exclusive Wallpapers. We at Humayun
                Interiors always put our clients first and provide the best and Unique Home
                Wallpapers in Gujrat, Pakistan.
            </div>
        </div>
    </div>
    <div class="mt-5 pt-5 pb-5 w-100 text-center" style="background-color: rgba(189, 189, 189, 0.726);">
        <h1>CATALOG DISPLAY</h1>
        <h1>CHINA WALLPAPERS</h1><br>
       <p>Below are our Exclusive catalog easily accessable on one click.</p>
    </div>
    <div class="pl-4 mt-5">
        <div class="row w-100">
        @foreach($posts as $post)
            <div class="col-md-4 mb-5 card-class">
                <div class="card">
                    <div class="card-body" style="background-image: url('{{asset('uploads/images/'.$post->image)}}'); height:250px;"></div>
                    <div class="card-title text-center pt-4">
                        <h4 class="text-dark">{{ $post->title }}</h4>
                    </div>
                    <div class="card-price">
                    <p><strong>Price:</strong> {{ $post->price }} R.s Per Feet</p>
                    </div>
                    <a href="{{ route('clients.show', $post->id) }}"><button class="btn btn-success w-100">Book Now</button></a>
                </div>
            </div>
        @endforeach
        </div>
    </div>

 @endsection
