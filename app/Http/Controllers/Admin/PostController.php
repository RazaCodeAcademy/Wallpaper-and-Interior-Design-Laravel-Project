<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Post;
use \App\Employee;
use \App\Category;
use \App\Project;

class PostController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->
        join('categories','categories.id','posts.category_id',)->
        select('categories.*','posts.*')->get();
        $categories = Category::all();
        return view('admin.posts',[
            'posts'=>$posts,
            'categories'=>$categories,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->price = $request->price;
        $post->category_id = $request->category_id;
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time(). '.' .$extension;
            $file->move('uploads/images/',$filename);
            $post->image = $filename;
        } else {
            return $request;
            $post->image = '';
        }
        $post->save();
        return redirect('/admin/posts/')->with('success','Data has been saved successfully');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'category_id'=>'required',
        ]);

        $post= Post::find($id);
        $post->title = $request->title;
        $post->price = $request->price;
        $post->category_id = $request->category_id;

        $post->save();
        return redirect('/admin/posts/')->with('success','Data has been updated successfully');
    }
    public function post(){
        $employee = Employee::get()->count('id');
        $project = Project::get()->count('id');
        $post = Post::get()->count('id');
        return view('admin.admin-index',[
            'post'=>$post,
            'employee'=>$employee,
            'project'=>$project,
        ]);
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/admin/posts/')->with('success','Data has been deleted successfully');
    }
}
