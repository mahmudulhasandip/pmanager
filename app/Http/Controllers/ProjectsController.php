<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('projects.index', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = NULL)
    {
        //
        return view('projects.create', ['company_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        //
        if(Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);
            if($project){
                return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'New project successfully created!!');
            }
        }

        // redirect
        return back()->withInput()->with('errors', 'Project create failed.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $project = Project::find($project->id);
        return view('projects.show', ['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);
        return view('projects.edit', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // save data
        $projectUpdate = Project::find($project->id)->update(['name'=>$request->input('name'), 'description'=> $request->input('description')]);

        if($projectUpdate){
            return redirect()->route('projects.show', ['project'=> $project->id])->with('success','Project update successfully.');
        }

        // redirect
        return back()->withInput()->with('errors', 'Project update failed.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $findProject = Project::find($project->id);

        if($findProject->delete()){
            // redirect
            return redirect()->route('projects.index')->with('success', 'Project has successfully deleted!!');
        }


        return back()->withInput()->with('errors', 'Project delete failed.');


    }
}
