<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Employee;
use \App\Project;
use \App\Post;
use \App\User;
use \App\Client;
use \App\Notification;
use \App\Category;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $employees = Employee::get()->count('id');
        $projects = Project::get()->count('id');
        $posts = Post::get()->count('id');
        $clients = Client::get()->count('id');
        $notifications = Notification::get()->count('id');
        $messages = Notification::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::get()->count('id');
        return view('admin.admin-index',[
            'posts'=>$posts,
            'employees'=>$employees,
            'projects'=>$projects,
            'users'=>$users,
            'clients'=>$clients,
            'notifications'=>$notifications,
            'categories'=>$categories,
            'messages'=>$messages,
        ]);
    }
}
