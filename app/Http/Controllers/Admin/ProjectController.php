<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Project;
use \App\Post;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = DB::table('posts')->
        // join('projects','posts.id','projects.paper_id',)->
        // select('projects.*','posts.*')->get();
        $projects = Project::all();
        $posts = Post::all();
        return view('admin.projects',[
            'projects' => $projects,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'project_title'=>'required',
            'paper_id'=>'required',
            'total_role'=>'required',
        ]);

        $project = new Project;
        $project->project_title = $request->project_title;
        $project->paper_id = $request->paper_id;
        $project->total_role = $request->total_role;

        $project->save();
        return redirect('/admin/projects/')->with('success','Data has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'used_role'=>'required',
        ]);


        $project = Project::find(1);
        $project->used_role = $request->used_role;

        $project->save();
        return redirect('/admin/projects/')->with('success','Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/admin/projects/')->with('success','Data has been deleted successfully');
    }
}
