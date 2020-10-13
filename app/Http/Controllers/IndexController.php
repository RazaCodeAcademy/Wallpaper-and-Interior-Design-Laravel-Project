<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class IndexController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('index',[
            'posts'=>$posts
        ]);
    }
    public function about(){
        $posts = Post::all();
        return view('about');
    }
    public function interior_designers(){
        $posts = Post::all();
        return view('interior_designers');
    }
    public function contact(){
        $posts = Post::all();
        return view('contact');
    }
}
